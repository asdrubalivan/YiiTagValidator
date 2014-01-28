<?php

/*
 * A small validator for attributes used with ETaggable
 * @author asdrubalivan
 */

class YiiTagValidator extends CValidator{
    public $max=null;
    public $min=null;
    protected function validateAttribute($object, $attribute) {
        $arrayTags = explode(',', $object->$attribute);
        foreach($arrayTags as $tag)
        {
            $lenTag = strlen($tag);
            if($this->max !== null && $lenTag > $this->max)
            {
                $this->addError($object, $attribute, 
                        "Tag $tag is too long. Maximum is $this->max");
            }
            elseif($this->min !== null && $lenTag < $this->min)
            {
                $this->addError($object, $attribute, 
                        "Tag $tag is too short. Minimum is $this->min");
            }
        }
    }    
}
