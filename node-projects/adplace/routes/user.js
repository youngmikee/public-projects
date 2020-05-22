const Express = require('express');
const User = require('../models/user');
const Auth = require('../middleware/auth');
const Route = Express.Router();

Route.get('/user', Auth, async (req, res) => {
    try {
        res.send(req.user);
    } catch (e) {
        res.status(404).send(e.message);
    }
});

Route.post('/user', async (req, res) => {
    const user = new User(req.body);
    try {
        const token = await user.generateAuthToken();
        await user.save();
        res.status(201).send({user, token});
    } catch (e) {
        res.status(400).send(e);
    }
});

Route.patch('/user', Auth, async (req, res) => {
    const updatable = ['password', 'name', 'email'];
    const updates = Object.keys(req.body);
    const isValidOperation = updates.every((update) => updatable.includes(update));
    if (!isValidOperation) {
        
        return res.send(400).send({error: 'Invalid updates'});
    }
    try {
        updates.forEach((update) => req.user[update] = req.body[update]);
        await req.user.save();
        res.status(200).send();
    } catch (e) {
        res.status(500).send(e.message);
    }
});

Route.delete('/user', Auth, async (req, res) => {
    try {
        const user = await User.findByIdAndDelete({_id: req.user._id});
        res.status(200).send();
    } catch (e) {
        res.status(500).send(e.message);
    }
})

module.exports = Route;