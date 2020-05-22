const Mongoose = require('mongoose');
const Validator = require('validator');
const Jwt = require('jsonwebtoken');
const Bcrypt = require('bcrypt');

const userSchema = new Mongoose.Schema({
    title: {
        type: String,
        trim: true,
        maxlength: 4
    },
    name: {
        type: String,
        required: true,
        trim: true,
    },
    email: {
        type: String,
        unique: true,
        required: true,
        trim: true,
        lowercase: true,
        validate (value) {
            if (!Validator.isEmail(value)) {
                throw new Error('Email is not valid');
            }
        }
    },
    mobile: {
        type: Number,
        trim: true,
        minlength: 12
    },
    password: {
        type: String,
        required: true,
        trim: true,
        minlength: 8,
        validate (value) {
            if (value.toLowerCase().includes('password')) {
                throw new Error('Password should not contain "password"');
            }
        }
    },
    address: {
        address_line1: {
            type: String,
            required: true,
            trim: true,
        },
        address_line2: {
            type: String,
            trim: true,
        },
        city: {
            type: String,
            required: true,
            trim: true,
        },
        postCode: {
            type: String,
            trim: true,
            maxlength: 8
        },
        county: {
            type: String,
            trim: true,
        },
        country: {
            type: String,
            required: true,
            trim: true
        }
    },
    tokens: [{
        token: {
            type: String,
            required: true
        }
    }]
}, {
    timestamps: true
});

/**
 * Auto strip out sensitive info
 * e.g password and tokens from user object
 */
userSchema.methods.toJSON = function () {
    const user = this;
    const userObject = user.toObject();
    delete userObject.password;
    delete userObject.tokens;

    return userObject;
};

/**
 * Find user by their email and password
 */
userSchema.statics.findByCredential = async (email, password) => {
    const user = await User.findOne({'email': email});
    if (!user) {
        throw new Error('Unable to login');
    }
    const match = await Bcrypt.compare(password, user.password);
    if (!match) {
        throw new Error('Unable to login');
    }
    
    return user;
};

/**
 * Generates authentication tokens
 */
userSchema.methods.generateAuthToken = async function () {
    const user = this;
    const token = Jwt.sign({_id: user._id.toString()}, 'godDayWithUs', {expiresIn: '1 day'});
    user.tokens = user.tokens.concat({token});
    await user.save();

    return token;
};

/**
 * Before saving the user
 */
userSchema.pre('save', async function (next) {
    const user = this;
    if (user.isModified('password')) {
        user.password = await Bcrypt.hash(user.password, 8);
    }
    next();
});

const User = Mongoose.model('User', userSchema);

module.exports = User;