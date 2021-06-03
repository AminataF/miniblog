<?php

class Form{

    public static $class = "form-control";
    // name c'est le nom de mon tableau j'ai ensuite cornets et supplements...
    //$value c'est le noms de mes champs dans le tableau et $data = $_GET c'est mon tableau entier
    public static function checkbox(string $name, string $value = null, array $data = []): string
    {
        $attribute = '';
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attribute .='checked';
        }
        $class = 'class="'. self::$class .'"';
        return <<<HTML
	<input type="checkbox" name="{$name}[]" value="$value" $attribute $class>
HTML;
    }

    public static function radio(string $name, string $value, array $data): string
    {
        $attribute = '';
        if (isset($data[$name]) && $value === $data[$name]) {
            $attribute .= 'checked';
        }
        return <<<HTML
		<input type="radio" name="{$name}" value="$value" $attribute>
HTML;
    }

    public static function select(string $name, $value, array $options): string
    {
        $html_options = [];
        foreach ($options as $key => $option) {
            $attribute = ($key == $value) ? ' selected ' : '';
            $html_options[] = "<option value='$key' $attribute>$option</option>";
        }
        return '<select class="form-control" name="' . $name . '">' . implode($html_options) . '</select>';
    }
}