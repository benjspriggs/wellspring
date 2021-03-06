<?php
class Song {
        ##Declare scope of variables
        public $song_name,
                $song_desc,
                $lyrics,
                $tags,
                $files,
                $embeds,
                $postdate,
                $timestamp;
        
        ##Set properties of song object in construction
        public function __construct($song_name, $song_desc, $lyrics, $tags = NULL, $embeds = NULL, $postdate = NULL, $timestamp = NULL){
                $this->song_name = $song_name;
                $this->song_desc = $song_desc;
                $this->lyrics = $lyrics;
                $this->embeds = $embeds;
                $this->postdate = $postdate;
                $this->timestamp = $timestamp;
                $this->tags = $this->createTags($song_name, $tags);
        }
        
        ##Song name as string, tags as comma separated list
        private function createTags($song_name, $tags = NULL){
                $songNameTags = explode(' ', $song_name);
                $songNameTags = array_map('trim', $songNameTags);
                $songNameTags = array_unique($songNameTags);
                $res = implode(', ', $songNameTags);
                if ($tags){
                        $songTags = explode(', ', $tags);
                        $songTags = array_map('trim', $songTags);
                        $songTags = array_unique($songTags);
                        $songTags = array_diff($songTags, $songNameTags);
                        $songTags = array_filter($songTags);
                        if (!empty($songTags)){
                                $res .= ', ' . implode(', ', $songTags);
                        }
                }
                return $res;
        }
        
        public function getFileData(){
                $val = $this->files;
                $this->files = array();
                return $val;
        }
        
        public function clearFileData(){
                $this->files = array();
        }
        
        public function assignFileData(array $uploaded, array $path){
                $this->files['name'] = $uploaded;
                $this->files['path'] = $path;
        }
        
        ##The name is a filetype or a domain (e.g. 1928.jpg or youtube.com), returns array with each metadata component
        private function splitName($name){
                $nameMeta = explode(".", $name);
                return $nameMeta;
        }
}
?>