<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 7:24 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'skill_title','type','icon','percentage','user_id'
    ];


    public function freelancer(){
        return $this->belongsTo(User::class);
    }

    public function icon () {
        $iconsPath = public_path() . '/images/skills_icons/';

        /**
         * Special icons conditions
         * 1. Name using dots, example: react.js, node.js. Special cases with js libraries
         * 2. Spaces between words, example: Adobe After Effects.
         * 3. Initials, for example: Visual Basic == vb.
         * 4. Largest or short names, example: Illustrator == Adobe Illustrator.
         * 5. Abbreviations for the skill or special chars in the name: js == javascript, C#.
         */

        $skillNameLower = strtolower($this->skill_title);
        $skillNameAux = "";

        // Original name in lowercase
        if (file_exists($iconsPath.$skillNameLower.".png")) return $iconsPath.$skillNameLower.".png";

        // Condition 1 and 2 //////////////////////////////////////////

        // For js libraries check if exists without "js" extension
        $skillNameWords = explode('.', $skillNameLower);
        
        if ($skillNameWords[count($skillNameWords) - 1] == "js") {
            $skillNameAux = implode("", $skillNameWords);
            if (file_exists($iconsPath.$skillNameAux.".png")) return $iconsPath.$skillNameAux.".png";

            array_pop($skillNameWords);
            $skillNameAux = implode("_", $skillNameWords);

            if (file_exists($iconsPath.$skillNameAux.".png")) return $iconsPath.$skillNameAux.".png";
        }

        // Check the other cases
        $skillNameAux = str_replace(['.', ' '], '_', $skillNameLower);

        if (file_exists($iconsPath.$skillNameAux.".png")) return $iconsPath.$skillNameAux.".png";

        ///////////////////////////////////////////////////////////////

        // Condition 3 ////////////////////////////////////////////////

        $skillNameWords = explode(' ', $skillNameLower);
        $skillNameAux = "";

        if (count($skillNameWords) > 1) {
            foreach ($skillNameWords as $word) {
                $skillNameAux .= $word[0];
            }
    
            if (file_exists($iconsPath.$skillNameAux.".png")) return $iconsPath.$skillNameAux.".png";
            ////////////////////////////////////////////////////////////////
    
            // Condition 4 /////////////////////////////////////////////////
            
            // Only consider the short name as last word
            $skillNameAux = $skillNameWords[count($skillNameWords) - 1];
    
            if (file_exists($iconsPath.$skillNameAux.".png")) return $iconsPath.$skillNameAux.".png";
        }


        // Condition 5: Special cases /////////////////////////////////

        switch ($skillNameLower) {
            case 'js':
                return $iconsPath.'javascript.png';

            case "c#":
                return $iconsPath."c_sharp.png";

            default:
                return $iconsPath."skill.png";
        }
        ///////////////////////////////////////////////////////////
    }
}