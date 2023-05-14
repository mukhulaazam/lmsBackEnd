const fs = require('fs');
const pathNor = require('path');
const multer = require('multer');

let maxSize = 5 * 1000 * 1000; // 5MB


var storagePath = multer.diskStorage({
    // @des :: setup file destination
    destination: function (req, file, cb) {
        const basePath = 'uploads';
        if(!fs.existsSync(basePath)){
            fs.mkdirSync(basePath,{ recursive: true });
        }
        const folder = req.query.folderName;
        const path = `${basePath}/${folder ?? ''}`;

        if (!fs.existsSync(path)) {
            fs.mkdirSync(path, { recursive: true });
        }
        cb(null, path);
    },
    // @des :: setup file name
    filename: function (req, file, cb) {
        let fileName = file.originalname;
        // generate unique file name
        const uniqueSuffix = Date.now() + Math.round(Math.random() * 1e9);
        if(fileName){
            fileName = `${uniqueSuffix}${fileName}`;
        }
        cb(null, fileName);
    }   
});


// des :: setup upload file destination
const uploadSingleFileDestination = multer({
    storage: storagePath,
    limits: { fileSize: maxSize },
}).single('file');


// @des :: Retrieve all files
exports.getFile = async (req, res) => {
    try {
        // const file = await File.findById(req.params.id);
        // res.status(200).json(req.params.id);
        res.status(200).json({ msg: `File retrieved ${req.params.id}` });
    } catch (err) {
        res.status(500).json(err);
    }
}

exports.uploadSingleFile = async (req, res) => {
    try {
        uploadSingleFileDestination(req, res, function (err) {
            console.log(req);
            if (err instanceof multer.MulterError) {
                return res.status(500).json(err);
            } else if (err) {
                return res.status(500).json(err);
            }
            return res.status(200).json({
                msg: `File uploaded successfully!`,
                fileName: req.file.path,
            });
        });
    } catch (err) {
        res.status(500).json(err);
    }
}