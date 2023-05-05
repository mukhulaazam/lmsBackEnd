const express = require('express');
const fileRoutes = require('./api/files/files.route');

// @des :: Create express app
const app = express();

app.use(express.json());
app.use(express.static('public'));
app.use(express.urlencoded({ extended: true }));

// @des :: API testing
app.get('/', (req, res) => {
    res.send(`File Server ready works!`);
});

// @des :: routes
app.use('/api/v1/files', fileRoutes);


// @des :: Define PORT
const PORT = process.env.PORT || 5000;

// @des :: Listen server response
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
    });


