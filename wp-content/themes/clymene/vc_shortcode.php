<?php 

//Custom Heading
if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __($clymene_pre_text." Heading", 'clymene'),

   "base"      => "heading",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

      array(

         "type"      => "textarea",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text", 'clymene'),

         "param_name"=> "text",

         "value"     => "Heading",

         "description" => __("", 'clymene')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Element Tag', 'clymene'),

        "param_name" => "tag",

        "value" => array(   
                     __('Select Tag', 'clymene') => '',

                     __('h1', 'clymene') => 'h1',

                     __('h2', 'clymene') => 'h2',

                     __('h3', 'clymene') => 'h3',  

                     __('h4', 'clymene') => 'h4',

                     __('h5', 'clymene') => 'h5',

                     __('h6', 'clymene') => 'h6',  

                     __('p', 'clymene')  => 'p',

                     __('div', 'clymene') => 'div',
                    ),

        "description" => __("Section Element Tag", 'clymene'),      

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Text Align', 'clymene'),

        "param_name" => "align",

        "value" => array(   

                     __('inherit', 'clymene') => 'inherit',

                     __('left', 'clymene') => 'left',

                     __('right', 'clymene') => 'right',  

                     __('center', 'clymene') => 'center',

                     __('justify', 'clymene') => 'justify',
                     
                    ),

        "description" => __("Select One", 'clymene'),      

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Font Size", 'clymene'),

         "param_name"=> "size",

         "value"     => "",

         "description" => __("", 'clymene')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Color", 'clymene'),

         "param_name"=> "color",

         "value"     => "",

         "description" => __("", 'clymene')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Margin Bottom", 'clymene'),

         "param_name"=> "bot",

         "value"     => "",

         "description" => __("", 'clymene')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Class Extra", 'clymene'),

         "param_name"=> "class",

         "value"     => "",

         "description" => __("", 'clymene')

      ),
    )));

}

// Buttons

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __($clymene_pre_text." Button"),

   "base" => "button",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Icon", 'clymene'),

         "param_name" => "icon",

         "value" => "",

         "description" => __("Button with icon. Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'clymene')

      ),
      array(

         "type" => "checkbox",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon After?", 'clymene'),

         "param_name" => "pos",

         "value" => "",

         "description" => __("Position icon after or before label button. Defaul: before.", 'clymene')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text", 'clymene'),

         "param_name" => "btntext",

         "value" => "Button Text",

         "description" => __("", 'clymene')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link", 'clymene'),

         "param_name" => "btnlink",

         "value" => '#',

         "description" => __("", 'clymene')

      ),

      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Type", 'clymene'),

         "param_name" => "type",

         "value" => array(
                     __('Version 1: Border', 'clymene') => 'ver1',  

                     __('Version 2: Dark', 'clymene') => 'ver2',

                     __('Version 3: Color', 'clymene') => 'ver3',
                    ),

         "description" => __("", 'clymene')

      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Size", 'clymene'),

         "param_name" => "size",

         "value" => array(   

                     __('Size 1', 'clymene') => 'size1',  

                     __('Size 2', 'clymene') => 'size2',  

                     __('Size 3', 'clymene') => 'size3',  

                     __('Size 4', 'clymene') => 'size4',  

                     __('Size 5', 'clymene') => 'size5',

                     __('Size 6', 'clymene') => 'size6',  

                     __('Size 7', 'clymene') => 'size7',   

                     __('Big Button', 'clymene') => 'bbtn',
                    ),

         "description" => __("", 'clymene')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Margin(top right bottom left)", 'clymene'),

         "param_name" => "margin",

         "value" => '',

         "description" => __("Follow order: top right bottom left. Ex: 10px 5px 5px 10px", 'clymene')

      ),
      
    )
    ));

}

//Home Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Home Video"),
   "base" => "homevideo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Big Text",
         "param_name" => "btext",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Small Text",
         "param_name" => "stext",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video .mp4",
         "param_name" => "mp4",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video .webm",
         "param_name" => "webm",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video .ogg",
         "param_name" => "ogg",
         "value" => "",
         "description" => __("", 'clymene')
      ),
    )
    ));
}


//Info Project
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Project Info"),
   "base" => "folioinfo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => "Description Top",
         "param_name" => "des",
         "value" => "",
         "description" => __("", 'clymene')
      ),     
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Detail Infomation", 'clymene'),
         "param_name" => "content",
         "value" => "<ul><li><i class='fa fa-paper-plane-o'></i><strong>Created by:</strong> Company Name</li></ul>",
         "description" => __("Example: &lt;ul&gt;
&lt;li&gt;&lt;i class='fa fa-paper-plane-o'&gt;&lt;/i&gt;&lt;strong&gt;Created by:&lt;/strong&gt; Company Name&lt;/li&gt;
&lt;/ul&gt;", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Out Project",
         "param_name" => "link",
         "value" => "",
         "description" => __("", 'clymene')
      ),
    )
    ));
}


//Slider Project

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Gallery Project", 'clymene'),
   "base"      => "folioslider",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Images Project",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Show Title?", 'clymene'),
         "param_name" => "title",
         "value" => array(   

                     __('No', 'clymene') => 'no',

                     __('Yes', 'clymene') => 'yes',

                    ),
         "description" => __("", 'clymene')
      ),
      
    )));
}


//Clients Logo 

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text." Clients Logo", 'clymene'),
   "base"      => "logos",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "ID Slider",
         "param_name" => "ids",
         "value" => "",
         "description" => __("Use when creat many carousels on page. Maybe empty.", 'clymene')
      ),
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Visible",
         "param_name" => "num",
         "value" => 4,
         "description" => __("Recommend number: 3, 4 or 5.", 'clymene')
      ), 
    )));
}

//Carousel Images

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Images Carousel", 'clymene'),
   "base"      => "carousels1",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Images",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Visible",
         "param_name" => "num",
         "value" => "",
         "description" => __("Number colunms images. Ex: 3. Default: 4", 'clymene')
      ),  
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Margin",
         "param_name" => "space",
         "value" => "",
         "description" => __("Space between images.", 'clymene')
      ), 
    )));
}

//Carousels Project

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Projects Carousel", 'clymene'),
   "base"      => "carousels2",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Portfolio",
         "param_name" => "show",
         "value" => "",
         "description" => __("Input -1 if want to show all.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Visible",
         "param_name" => "num",
         "value" => "",
         "description" => __("Number colunms portfolio. Ex: 3. Default: 4", 'clymene')
      ),  
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Margin",
         "param_name" => "space",
         "value" => "",
         "description" => __("Space between images.", 'clymene')
      ),
       array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Background Color",
         "param_name" => "bg",
         "value" => "",
         "description" => __("Choose background color for text bottom image.", 'clymene')
      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Carousels Type", 'clymene'),

         "param_name" => "type",

         "value" => array(
                     __('Type 1: Text Bottom', 'clymene') => 'type1',  

                     __('Type 2: Image Only', 'clymene') => 'type2',
                    ),

         "description" => __("Choose Carousels Type", 'clymene')

      ),
    )));
}

//Carousels Blog

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Blog Carousel", 'clymene'),
   "base"      => "carousels3",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Post",
         "param_name" => "show",
         "value" => "",
         "description" => __("Input -1 if want to show all.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number Visible",
         "param_name" => "num",
         "value" => "",
         "description" => __("Number colunms post. Ex: 3. Default: 4", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Background Color",
         "param_name" => "bg",
         "value" => "",
         "description" => __("Choose background color for item blog.", 'clymene')
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Margin",
         "param_name" => "space",
         "value" => "",
         "description" => __("Space between images.", 'clymene')
      ), 
    )));
}


//Process Steps

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Process Steps", 'clymene'),
   "base"      => "psteps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Process",
         "param_name" => "icon",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title Process",
         "param_name" => "title",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Description Process",
         "param_name" => "content",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Label Button",
         "param_name" => "btn",
         "value" => "",
         "description" => __("Use for type 2: Timeline", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Out Process",
         "param_name" => "link",
         "value" => "",
         "description" => __("Use for type 2: Timeline", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Percent",
         "param_name" => "per",
         "value" => "",
         "description" => __("Use for type 2: Timeline", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Background Color",
         "param_name" => "bg",
         "value" => "",
         "description" => __("Choose background color for box.", 'clymene')
      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Process Type", 'clymene'),

         "param_name" => "type",

         "value" => array(
                     __('Type 1: Process Box', 'clymene') => 'type1',  

                     __('Type 2: Process Timeline', 'clymene') => 'type2',
                    ),

         "description" => __("Choose Process Type", 'clymene')

      ),
    )));
}

//Alert Boxes

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Alert Boxes", 'clymene'),
   "base"      => "alertbox",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "content",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Before",
         "param_name" => "icon",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Background Box",
         "param_name" => "bg",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => "Border Box",
         "param_name" => "border",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Padding Box",
         "param_name" => "padd",
         "value" => "",
         "description" => __("Padding follow: top right bottom left. Ex: 10px. Default: 20px.", 'clymene')
      ),
    )));
}


//Title Parallax

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Title Parallax", 'clymene'),
   "base"      => "titlepr",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Big Title",
         "param_name" => "content",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Small Title",
         "param_name" => "subtitle",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Arrow Button",
         "param_name" => "link",
         "value" => "#scroll-link",
         "description" => __("", 'clymene')
      ),
    )));
}

//Project Parallax Item

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Parallax Project", 'clymene'),
   "base"      => "projpl",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Big Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Small Title",
         "param_name" => "subtitle",
         "value" => "",
         "description" => __("", 'clymene')
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image Project",
         "param_name" => "image",
         "value" => "",
         "description" => __("", 'clymene')
      ),
    )));
}


//About Video or Gallery
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."About Video or Images"),
   "base" => "aboutvos",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => __("Images Left", 'clymene'),
         "param_name" => "gallery",
         "value" => "",
         "description" => __("Upload images left if not use video.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video",
         "param_name" => "video",
         "value" => "",
         "description" => __("Add link vimeo or youtube.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Height Video",
         "param_name" => "height",
         "value" => "",
         "description" => __("Change height video left. Default: 290.", 'clymene')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description Right", 'clymene'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content About", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Description Padding Top",
         "param_name" => "padd",
         "value" => "",
         "description" => __("Change padding top to text center box. Default: 290px.", 'clymene')
      ),
    )
    ));
}


//Our Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Team Member", 'clymene'),
   "base" => "ourteam",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Photo",
         "param_name" => "photo",
         "value" => "",
         "description" => __("Avarta of member, Recomended Size: 280 x 280", 'clymene')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name", 'clymene'),
         "param_name" => "name",
         "value" => "",
         "description" => __("Member's Name", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Job", 'clymene'),
         "param_name" => "job",
         "value" => "",
         "description" => __("Member's job.", 'clymene')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description", 'clymene'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Member's description.", 'clymene')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Testimonial", 'clymene'),
         "param_name" => "say",
         "value" => "",
         "description" => __("Member say. Use for team version 2.", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Color", 'clymene'),
         "param_name" => "color",
         "value" => "",
         "description" => __("Color Box.", 'clymene')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 1", 'clymene'),
         "param_name"=> "icon1",
         "value"     => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon 1",
         "param_name"=> "link1",
         "value"     => "",
         "description" => __("Url.", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 2", 'clymene'),
         "param_name"=> "icon2",
         "value"     => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon 2",
         "param_name"=> "link2",
         "value"     => "",
         "description" => __("Url.", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 3", 'clymene'),
         "param_name"=> "icon3",
         "value"     => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon 3",
         "param_name"=> "link3",
         "value"     => "",
         "description" => __("Url.", 'clymene')
      ),
    )));
}

//Team Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Team Slider"),
   "base" => "teamslide",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Visible Number",
         "param_name" => "show",
         "value" => "",
         "description" => __("Number colunms slider.", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Color", 'clymene'),
         "param_name" => "color",
         "value" => "",
         "description" => __("Color Box.", 'clymene')
      ),   
    )));
}

//Testimonial Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Testimonial Slider"),
   "base" => "testislide",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Show Number Post",
         "param_name" => "show",
         "value" => "",
         "description" => __("Number testimonial slider. Show all: -1.", 'clymene')
      ),
    )));
}

//Call To Action
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Call To Action"),
   "base" => "cta",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", 'clymene'),
         "param_name" => "title",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Label Button",
         "param_name" => "btn",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", 'clymene'),
         "param_name" => "link",
         "value" => "#",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Subtitle", 'clymene'),
         "param_name" => "stitle",
         "value" => "",
         "description" => __("Top subtitle. Use for style 2.", 'clymene')
      ),
    )
    ));
}

// Our Facts
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Our Facts", 'clymene'),
   "base" => "ourfacts",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Fact", 'clymene'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Our Facts box.", 'clymene')
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Fact", 'clymene'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Number display in Our Facts box.", 'clymene')
      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Facts Type", 'clymene'),

         "param_name" => "style",

         "value" => array(
                     __('Style 1: Title Bottom', 'clymene') => 'type1',  

                     __('Style 2: Title Top', 'clymene') => 'type2',
                    ),

         "description" => __("", 'clymene')

      ),
    )));
}


// Our Skills
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."Our Skill", 'clymene'),
   "base" => "ourskill",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Skill Title", 'clymene'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display top.", 'clymene')
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Skill Percent", 'clymene'),
         "param_name" => "per",
         "value" => "",
         "description" => __("Ex: 90.", 'clymene')
      ),
    )));
}

// LightBox
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($clymene_pre_text."LightBox", 'clymene'),
   "base" => "lightbox",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image", 'clymene'),
         "param_name" => "image",
         "value" => "",
         "description" => __("Upload Image.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Video", 'clymene'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Use for lightbox with video. Empty if not use.", 'clymene')
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => __("Group?", 'clymene'),
         "param_name" => "grp",
         "value" => "",
         "description" => __("Use for lightbox gallery. Empty if use lightbox single.", 'clymene')
      ),
    )));
}

// Services Box
if(function_exists('vc_map')){
	vc_map( array(
   "name" => __($clymene_pre_text."Services Box"),
   "base" => "services",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Service",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'clymene')
      ), 	
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Service", 'clymene'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Services box.", 'clymene')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content Service", 'clymene'),
         "param_name" => "content",
         "value" => "",
         "description" => __("About your Services.", 'clymene')
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Color Box", 'clymene'),
         "param_name" => "bg",
         "value" => "",
         "description" => __("Choose color services box.", 'clymene')
      ),
      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Service Style", 'clymene'),

         "param_name" => "type",

         "value" => array(
                     __('Style 1: Icon Left', 'clymene') => 'type1',  

                     __('Style 2: Icon Center', 'clymene') => 'type2',
                    ),

         "description" => __("", 'clymene')

      ),
    )
    ));
}


// Pricing Table
if(function_exists('vc_map')){
	vc_map( array(
   "name" => __($clymene_pre_text." Pricing Table", 'clymene'),
   "base" => "pricingtable",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Pricing", 'clymene'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Pricing Table.", 'clymene')
      ),
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price Pricing", 'clymene'),
         "param_name" => "price",
         "value" => "",
         "description" => __("Price display in Pricing Table.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Unit", 'clymene'),
         "param_name" => "money",
         "value" => "",
         "description" => __("", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Time", 'clymene'),
         "param_name" => "per",
         "value" => "",
         "description" => __("Per Month or Year display in Pricing Table.", 'clymene')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Detail Pricing", 'clymene'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Pricing Table.", 'clymene')
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'clymene'),
         "param_name" => "btn",
         "value" => "",
         "description" => __("Text display in button.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", 'clymene'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link in button.", 'clymene')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Width Box", 'clymene'),
         "param_name" => "width",
         "value" => "",
         "description" => __("Use when haven't space between colunms. Ex: 25%, 33.33%, 20%.", 'clymene')
      ),
	  array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => __("Featured Pricing?", 'clymene'),
         "param_name" => "featured",
         "value" => "",
         "description" => __("", 'clymene')
      ),
    )));
}

// Portfolio
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Portfolio Filter", 'clymene'),
   "base"      => "workft",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
       array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Show All Portfolio", 'clymene'),
         "param_name"=> "all",
         "value"     => "",
         "description" => __("Text Filter Show All Portfolio.", 'clymene')
      ),
       array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Number Projects", 'clymene'),
         "param_name"=> "show",
         "value"     => "",
         "description" => __("Input number projects. Show all: -1. Default: 9.", 'clymene')
      ),
       array(
         "type"      => "checkbox",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Hide Content Bottom?", 'clymene'),
         "param_name"=> "notcn",
         "value"     => '',
         "description" => __("Show Title and Excerpt Bottom.", 'clymene')
      ),
       array(
         "type"      => "checkbox",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Masonry Portfolio?", 'clymene'),
         "param_name"=> "mas",
         "value"     => '',
         "description" => __("Masonry or Grid.", 'clymene')
      ),
       array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Number Colunms", 'clymene'),

         "param_name" => "style",

         "value" => array(
                     __('4 Colunms', 'clymene') => 'type1',  

                     __('3 Colunms', 'clymene') => 'type2',

                     __('2 Colunms', 'clymene') => 'type3',
                    ),

         "description" => __("", 'clymene')

      ),
    )));
}



//Contact Info
if(function_exists('vc_map')){
	vc_map( array(
   "name"      => __($clymene_pre_text."Contact Info", 'clymene'),
   "base"      => "cinfo",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon", 'clymene'),
         "param_name"=> "icon",
         "value"     => "",
         "description" => __("Icon before title info", 'clymene')
      ),
	   array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Title", 'clymene'),
         "param_name"=> "title",
         "value"     => "",
         "description" => __("Title info", 'clymene')
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Description", 'clymene'),
         "param_name"=> "desc",
         "value"     => "",
         "description" => __("Description info", 'clymene')
      ),
    )));
}

//Socials
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Social Item", 'clymene'),
   "base"      => "socials",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon", 'clymene'),
         "param_name"=> "icon",
         "value"     => "",
         "description" => __("Icon Social.", 'clymene')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Link", 'clymene'),
         "param_name"=> "link",
         "value"     => "",
         "description" => __("Link Social.", 'clymene')
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Tootip", 'clymene'),
         "param_name"=> "text",
         "value"     => "",
         "description" => __("Description Social.", 'clymene')
      ),
    )));
}

//Image Comparison
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Comparison Images", 'clymene'),
   "base"      => "comparisons",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Image 1", 'clymene'),
         "param_name"=> "img1",
         "value"     => "",
         "description" => __("Upload image 1.", 'clymene')
      ),
      array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Image 2", 'clymene'),
         "param_name"=> "img2",
         "value"     => "",
         "description" => __("Upload image 2.", 'clymene')
      ),
      array(
         "type"      => "checkbox",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Vertical Slider?", 'clymene'),
         "param_name"=> "ver",
         "value"     => "",
         "description" => __("Default Horizontal.", 'clymene')
      ),
    )));
}

//Google Map

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($clymene_pre_text."Google Maps", 'clymene'),
   "base"      => "ggmaps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "checkbox",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Always Show Map?", 'clymene'),
         "param_name"=> "map",
         "value"     => '',
         "description" => __("Always show map or click button to show.", 'clymene')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Label Button", 'clymene'),
         "param_name"=> "btn",
         "value"     => '',
         "description" => __("", 'clymene')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Latitude", 'clymene'),
         "param_name"=> "latitude",
         "value"     => '',
         "description" => __("", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Longitude", 'clymene'),
         "param_name"=> "longitude",
         "value"     => '',
         "description" => __("", 'clymene')
      ),     
     array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Location Image", 'clymene'),
         "param_name"=> "imgmap",
         "value"     => "",
         "description" => __("Upload Location Image.", 'clymene')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Tootip Location Click", 'clymene'),
         "param_name"=> "tooltip",
         "value"     => '',
         "description" => __("", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Zoom map number", 'clymene'),
         "param_name"=> "zoom",
         "value"     => '',
         "description" => __("", 'clymene')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Height (px)", 'clymene'),
         "param_name"=> "height",
         "value"     => '',
         "description" => __("Example: 400px.", 'clymene')
      ),
    )));
}
?>