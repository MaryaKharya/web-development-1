<?php
$form = '<form class=form action=php/index.php method=POST>';
const TYPE_INPUT = 'input';
const TYPE_LABEL = 'label';
const TYPE_SELECT = 'select';
const TYPE_TEXTAREA = 'textarea';
$fields = [
    'nameLabel' => [
        'tag' => TYPE_LABEL,
        'for' => 'name',
        'text' => 'Ваше имя <span class=\"star\">*</span>'
    ],
    'name' => [
        'tag' => TYPE_INPUT,
        'class' => 'input_cell',
        'name' => 'name',
        'id' => 'name',
        'type' => 'text',
        'maxlength' => '255',
        'required' => 'required',
        'title' => 'Имя',
        'placeholder' => 'Например, Иван',
        'br' => 'true'
    ],
    'emailLabel' => [
        'tag' => TYPE_LABEL,
        'for' => 'email',
        'text' => 'Ваш email <span class=\"star\">*</span>'
    ],
    'email' => [
        'tag' => TYPE_INPUT,
        'class' => 'input_cell',
        'name' => 'email',
        'id' => 'email',
        'type' => 'email',
        'maxlength' => '255',
        'required' => 'required',
        'title' => 'Email',
        'placeholder' => 'Например, Ivan12@mail.ru',
        'br' => 'true'
    ],
    'countryLabel' => [
        'tag' => TYPE_LABEL,
        'for' => 'country',
        'text' => 'Откуда вы?'
    ],
    'country' => [
        'tag' => TYPE_SELECT,
        'class' => 'input_cell country',
        'name' => 'country',
        'id' => 'country',
        'title' => 'Страна',
        'size' => '1',
        'options' => [
            'Россия',
            'Белоруссия',
            'Казахстан',
            'Украина',
            'Армения',
            'Азребайджан',
            'Киргизия',
            'Молдавия',
            'Таджикистан',
            'Узбекистан'
        ],
        'br' => 'true'
    ],
    'labelSex' => [
        'tag' => TYPE_LABEL,
        'for' => 'sex',
        'text' => 'Ваш пол'
    ],
    'male' => [
        'tag' => TYPE_INPUT,
        'class' => 'male',
        'name' => 'sex',
        'id' => 'male',
        'type' => 'radio',
        'value' => 'male'
    ],
    'labelMale' => [
        'tag' => TYPE_LABEL,
        'for' => 'male',
        'text' => 'Мужской'
    ],
    'female' => [
        'tag' => TYPE_INPUT,
        'class' => 'female',
        'name' => 'sex',
        'id' => 'female',
        'type' => 'radio',
        'value' => 'female'
    ],
    'labelFemale' => [
        'tag' => TYPE_LABEL,
        'for' => 'female',
        'text' => 'Женский'
    ],
    'labelSms' => [
        'tag' => TYPE_LABEL,
        'for' => 'sms',
        'text' => 'Ваше сообщение <span class=\"star\">*</span>'
    ],
    'message' => [
        'tag' => TYPE_TEXTAREA,
        'class' => 'input_cell sms',
        'name' => 'sms',
        'id' => 'sms',
        'maxlength' => '1020',
        'required' => 'required',
        'title' => 'Сообщение',
        'br' => 'true'
    ],
    'submit' => [
        'tag' => TYPE_INPUT,
        'class' => 'submit',
        'type' => 'submit',
        'value' => 'Отправить'
    ]
];

foreach ($fields as $fieldName => $fieldAttrs)
{
    if ($fieldAttrs['tag'] === TYPE_LABEL)
    {
        $tag = "<label for=\"${fieldAttrs['for']}\">${fieldAttrs['text']}</label>";
    }
    elseif ($fieldAttrs['tag'] === TYPE_INPUT)
    {
        $tag = '<input';
        ( !array_key_exists('class', $fieldAttrs) ) ?: $tag .= " class=\"${fieldAttrs['class']}\"";
        ( !array_key_exists('name', $fieldAttrs) ) ?: $tag .= " name=\"${fieldAttrs['name']}\"";
        ( !array_key_exists('id', $fieldAttrs) ) ?: $tag .= " id=\"${fieldAttrs['id']}\"";
        ( !array_key_exists('type', $fieldAttrs) ) ?: $tag .= " type=\"${fieldAttrs['type']}\"";
        ( !array_key_exists('maxlength', $fieldAttrs) ) ?: $tag .= " maxlength=\"${fieldAttrs['maxlength']}\"";
        ( !array_key_exists('required', $fieldAttrs) ) ?: $tag .= " required=\"${fieldAttrs['required']}\"";
        ( !array_key_exists('title', $fieldAttrs) ) ?: $tag .= " title=\"${fieldAttrs['title']}\"";
        ( !array_key_exists('placeholder', $fieldAttrs) ) ?: $tag .= " placeholder=\"${fieldAttrs['placeholder']}\"";
        ( !array_key_exists('value', $fieldAttrs) ) ?: $tag .= " value=\"${fieldAttrs['value']}\"";
        $tag .= '>';
        ( !array_key_exists('br', $fieldAttrs) ) ?:'<br>';
    }
    elseif ($fieldAttrs['tag'] === TYPE_SELECT)
    {
        $options = '';
        foreach ($fieldAttrs['options'] as $value)
        {
            $options .= "<option>$value</option>";
        }

        $tag = '<select';
        ( !array_key_exists('class', $fieldAttrs) ) ?: $tag .= " class=\"${fieldAttrs['class']}\"";
        ( !array_key_exists('name', $fieldAttrs) ) ?: $tag .= " name=\"${fieldAttrs['name']}\"";
        ( !array_key_exists('id', $fieldAttrs) ) ?: $tag .= " id=\"${fieldAttrs['id']}\"";
        ( !array_key_exists('title', $fieldAttrs) ) ?: $tag .= " title=\"${fieldAttrs['title']}\"";
        ( !array_key_exists('size', $fieldAttrs) ) ?: $tag .= " size=\"${fieldAttrs['size']}\"";
        $tag .= ">${options}</select>";
        ( !array_key_exists('br', $fieldAttrs) ) ?:'<br>';
    }
    elseif ($fieldAttrs['tag'] === 'textarea')
    {
        $tag = '<textarea';
        ( !array_key_exists('class', $fieldAttrs) ) ?: $tag .= " class=\"${fieldAttrs['class']}\"";
        ( !array_key_exists('name', $fieldAttrs) ) ?: $tag .= " name=\"${fieldAttrs['name']}\"";
        ( !array_key_exists('id', $fieldAttrs) ) ?: $tag .= " id=\"${fieldAttrs['id']}\"";
        ( !array_key_exists('maxlength', $fieldAttrs) ) ?: $tag .= " maxlength=\"${fieldAttrs['maxlength']}\"";
        ( !array_key_exists('required', $fieldAttrs) ) ?: $tag .= " required=\"${fieldAttrs['required']}\"";
        ( !array_key_exists('title', $fieldAttrs) ) ?: $tag .= " title=\"${fieldAttrs['title']}\"";
        $tag .= '></textarea>';
        ( !array_key_exists('br', $fieldAttrs) ) ?:'<br>';
    }
    $form .= $tag;
}

$form .= '</form>';
echo $form;
