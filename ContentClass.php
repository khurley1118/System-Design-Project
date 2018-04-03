<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

// Content class for TuPro.
//private attributes
Class Content {

    private $description;
    private $uploadDate;
    private $fileName;
    private $filePath;

    public function getDescription(){
    return $this->description;
    }

    public function setDescription($description){
      $this->description = $description;
    }

    public function getUploadDate(){
      return $this->uploadDate;
    }

    public function setUploadDate($uploadDate){
      $this->uploadDate = $uploadDate;
    }

    public function getFileName(){
      return $this->fileName;
    }

    public function setFileName($fileName){
      $this->fileName = $fileName;
    }

    public function getFilePath(){
      return $this->filePath;
    }

    public function setFilePath($filePath){
      $this->filePath = $filePath;
    }

    //constructor
    function __construct() {

    }

    //calls DL function to retrieve text files from path
    function getText($con, $path) {
      return DLgetText($con, $path);
    }

    //calls DL function to retrieve audio files from path
    function getAudio($con, $path){
      return DLgetAudio($con, $path);
    }

    //calls DL function to retrieve video files from path
    function getVideo($con, $path){
      return DLgetVideo($con, $path);
    }

    //calls DL function to insert content
    function insertContent($con,$type,$courseCode){
      return DLinsertContent($con, $type, $courseCode, $this->getUploadDate(), $this->getFilePath(), $this->getDescription(), $this->getFileName());
    }
}
?>
