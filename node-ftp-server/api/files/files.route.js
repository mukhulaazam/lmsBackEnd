const router = require('express').Router();

// @des :: Responsible function for routes
const { getFile, uploadSingleFile } = require('./files.handler');

// @des :: routes
router.get('/:id', getFile);
router.post('/single', uploadSingleFile);
// router.post('/', upload.array('file'), uploadNultipleFile);






//@des export the files route
module.exports = router;