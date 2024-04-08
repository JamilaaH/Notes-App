<?php
require_once "framework/Model.php";
require_once "Note1.php";
require_once "User.php";

class TextNote1 extends Note1 {
  
    public ?string $content = null ;
    public function get_type() : string {
        return TypeNote1::TN;
        
    }
    public static function get_note(int $note_id) : Note1 |false {
        $query = self::execute("SELECT * FROM Notes JOIN text_notes ON notes.id = text_notes.id WHERE notes.id = :id", ["id" => $note_id]);
        $data = $query->fetch(); 
        if($query->rowCount() == 0) {
            return false;
        }else {
            return new TextNote1($data['id'], $data['title'] , $data['owner'], $data['created_at'],$data['pinned'], $data['archived'], $data['weight'],$data['edited_at']);
        }

    }
    public function get_content() : String {
        $dataQuery = self::execute("SELECT content FROM text_notes WHERE id = :note_id", ["note_id" => $this->note_id]);
        $content = $dataQuery->fetchColumn(); 
        // pour éviter lien mort lorsque le contenu est null
        if ($content == null){
            $content = "";
        }
        return $content;
    }
}