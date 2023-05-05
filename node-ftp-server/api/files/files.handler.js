const fs = require('fs');
const multer = require('multer');

let maxSize = 5 * 1000 * 1000; // 5MB


var storagePath = multer.diskStorage({
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
    }   
});

var filename = function (req, file, cb) {
    cb(null, file.originalname);
}


// des :: setup upload file destination
const uploadSingleFileDestination = multer({
    storage: storagePath,
    filename: filename,
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
            if (err instanceof multer.MulterError) {
                return res.status(500).json(err);
            } else if (err) {
                return res.status(500).json(err);
            }
            // console.log(req);
            return res.status(200).json({
                msg: `File uploaded successfully!`,
                fileName: req.file,
            });
        });
    } catch (err) {
        res.status(500).json(err);
    }
}