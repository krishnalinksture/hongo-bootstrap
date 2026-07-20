<?php
/**
 * Hongo Custom Width Class List For VC.
 *
 * @package Hongo
 */
?>
<?php

if ( ! class_exists( 'Vc_Manager' ) ) {
    return;
}

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column Start */
/*-----------------------------------------------------------------------------------*/

$hongo_vc_extra_id = array(
    'type'        => 'textfield',
    'heading'     => esc_html__( 'Element ID', 'hongo-addons'),
    'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %s).', 'hongo-addons'), '<a target="_blank" href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>'),
    'param_name'  => 'id',
    'group'       => esc_html__( 'Extras', 'hongo-addons' )
);

$hongo_vc_extra_class = array(
    'type'        => 'textfield',
    'heading'     => esc_html__( 'Extra class name', 'hongo-addons'),
    'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'hongo-addons'),
    'param_name'  => 'class',
    'group'       => esc_html__( 'Extras', 'hongo-addons' )
);

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* VC Column Start */
/*-----------------------------------------------------------------------------------*/

$hongo_vc_column =array(
  esc_html__( 'Select', 'hongo-addons')      => '',
  esc_html__( '1 column - 1/12', 'hongo-addons')      => '1/12',
  esc_html__( '2 columns - 1/6', 'hongo-addons')      => '1/6',
  esc_html__( '3 columns - 1/4', 'hongo-addons')      => '1/4',
  esc_html__( '4 columns - 1/3', 'hongo-addons')      => '1/3',
  esc_html__( '5 columns - 5/12', 'hongo-addons')     => '5/12',
  esc_html__( '6 columns - 1/2', 'hongo-addons')      => '1/2',
  esc_html__( '7 columns - 7/12', 'hongo-addons')     => '7/12',
  esc_html__( '8 columns - 2/3', 'hongo-addons')      => '2/3',
  esc_html__( '9 columns - 3/4', 'hongo-addons')      => '3/4',
  esc_html__( '10 columns - 5/6', 'hongo-addons')     => '5/6',
  esc_html__( '11 columns - 11/12', 'hongo-addons')   => '11/12',
  esc_html__( '12 columns - 1/1', 'hongo-addons')     => '1/1',
  esc_html__( '20% - 1/5', 'hongo-addons')            => '1/5',
  esc_html__( '40% - 2/5', 'hongo-addons')            => '2/5',
  esc_html__( '60% - 3/5', 'hongo-addons')            => '3/5',
  esc_html__( '80% - 4/5', 'hongo-addons')            => '4/5'
);

/*-----------------------------------------------------------------------------------*/
/* VC Column End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Contact Form 7 Start */
/*-----------------------------------------------------------------------------------*/

$cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
    }
} else {
    $contact_forms[ esc_html__( 'No contact forms found', 'hongo-addons' ) ] = 0;
}

/*-----------------------------------------------------------------------------------*/
/* Contact Form 7 End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Element Tag Start */
/*-----------------------------------------------------------------------------------*/

$hongo_element_tag =array(
    esc_html__( 'Default', 'hongo-addons') => '',
    esc_html__( 'h1', 'hongo-addons') => 'h1',
    esc_html__( 'h2', 'hongo-addons') => 'h2',
    esc_html__( 'h3', 'hongo-addons') => 'h3',
    esc_html__( 'h4', 'hongo-addons') => 'h4',
    esc_html__( 'h5', 'hongo-addons') => 'h5',
    esc_html__( 'h6', 'hongo-addons') => 'h6',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Element Tag End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Desktop Background Image Start */
/*-----------------------------------------------------------------------------------*/

$hongo_desktop_bg_image_position =array(
    esc_html__( 'Default', 'hongo-addons' ) => '',
    esc_html__( 'Left Top', 'hongo-addons' ) => 'bg-position-left-top',
    esc_html__( 'Left Middle', 'hongo-addons' ) => 'bg-position-left-center',
    esc_html__( 'Left Bottom', 'hongo-addons' ) => 'bg-position-left-bottom',
    esc_html__( 'Center Top', 'hongo-addons' ) => 'bg-position-center-top',
    esc_html__( 'Center Middle', 'hongo-addons' ) => 'bg-position-center-center',
    esc_html__( 'Center Bottom', 'hongo-addons' ) => 'bg-position-center-bottom',
    esc_html__( 'Right Top', 'hongo-addons' ) => 'bg-position-right-top',
    esc_html__( 'Right Middle', 'hongo-addons' ) => 'bg-position-right-center',
    esc_html__( 'Right Bottom', 'hongo-addons' ) => 'bg-position-right-bottom',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Desktop Background Image End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Mini Desktop Background Image Start */
/*-----------------------------------------------------------------------------------*/

$hongo_desktop_mini_bg_image_position =array(
    esc_html__( 'Default', 'hongo-addons' ) => '',
    esc_html__( 'Left Top', 'hongo-addons' ) => 'md-bg-position-left-top',
    esc_html__( 'Left Middle', 'hongo-addons' ) => 'md-bg-position-left-center',
    esc_html__( 'Left Bottom', 'hongo-addons' ) => 'md-bg-position-left-bottom',
    esc_html__( 'Center Top', 'hongo-addons' ) => 'md-bg-position-center-top',
    esc_html__( 'Center Middle', 'hongo-addons' ) => 'md-bg-position-center-center',
    esc_html__( 'Center Bottom', 'hongo-addons' ) => 'md-bg-position-center-bottom',
    esc_html__( 'Right Top', 'hongo-addons' ) => 'md-bg-position-right-top',
    esc_html__( 'Right Middle', 'hongo-addons' ) => 'md-bg-position-right-center',
    esc_html__( 'Right Bottom', 'hongo-addons' ) => 'md-bg-position-right-bottom',
);


/*-----------------------------------------------------------------------------------*/
/* Hongo Mini Desktop Background Image End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Ipad Background Image Start */
/*-----------------------------------------------------------------------------------*/

$hongo_ipad_bg_image_position =array(
    esc_html__( 'Default', 'hongo-addons' ) => '',
    esc_html__( 'Left Top', 'hongo-addons' ) => 'sm-bg-position-left-top',
    esc_html__( 'Left Middle', 'hongo-addons' ) => 'sm-bg-position-left-center',
    esc_html__( 'Left Bottom', 'hongo-addons' ) => 'sm-bg-position-left-bottom',
    esc_html__( 'Center Top', 'hongo-addons' ) => 'sm-bg-position-center-top',
    esc_html__( 'Center Middle', 'hongo-addons' ) => 'sm-bg-position-center-center',
    esc_html__( 'Center Bottom', 'hongo-addons' ) => 'sm-bg-position-center-bottom',
    esc_html__( 'Right Top', 'hongo-addons' ) => 'sm-bg-position-right-top',
    esc_html__( 'Right Middle', 'hongo-addons' ) => 'sm-bg-position-right-center',
    esc_html__( 'Right Bottom', 'hongo-addons' ) => 'sm-bg-position-right-bottom',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Ipad Background Image End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Mobile Background Image Start */
/*-----------------------------------------------------------------------------------*/

$hongo_mobile_bg_image_position =array(
    esc_html__( 'Default', 'hongo-addons' ) => '',
    esc_html__( 'Left Top', 'hongo-addons' ) => 'xs-bg-position-left-top',
    esc_html__( 'Left Middle', 'hongo-addons' ) => 'xs-bg-position-left-center',
    esc_html__( 'Left Bottom', 'hongo-addons' ) => 'xs-bg-position-left-bottom',
    esc_html__( 'Center Top', 'hongo-addons' ) => 'xs-bg-position-center-top',
    esc_html__( 'Center Middle', 'hongo-addons' ) => 'xs-bg-position-center-center',
    esc_html__( 'Center Bottom', 'hongo-addons' ) => 'xs-bg-position-center-bottom',
    esc_html__( 'Right Top', 'hongo-addons' ) => 'xs-bg-position-right-top',
    esc_html__( 'Right Middle', 'hongo-addons' ) => 'xs-bg-position-right-center',
    esc_html__( 'Right Bottom', 'hongo-addons' ) => 'xs-bg-position-right-bottom',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Mobile Background Image End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Desktop Width Start */
/*-----------------------------------------------------------------------------------*/

$hongo_desktop_width =array(
    esc_html__('Select Width', 'hongo-addons') => '',
    esc_html__('Auto', 'hongo-addons') => 'width-auto',
    esc_html__('10%', 'hongo-addons') => 'width-10',
    esc_html__('15%', 'hongo-addons') => 'width-15',
    esc_html__('20%', 'hongo-addons') => 'width-20',
    esc_html__('25%', 'hongo-addons') => 'width-25',
    esc_html__('30%', 'hongo-addons') => 'width-30',
    esc_html__('35%', 'hongo-addons') => 'width-35',
    esc_html__('40%', 'hongo-addons') => 'width-40',
    esc_html__('45%', 'hongo-addons') => 'width-45',
    esc_html__('50%', 'hongo-addons') => 'width-50',
    esc_html__('55%', 'hongo-addons') => 'width-55',
    esc_html__('60%', 'hongo-addons') => 'width-60',
    esc_html__('65%', 'hongo-addons') => 'width-65',
    esc_html__('70%', 'hongo-addons') => 'width-70',
    esc_html__('75%', 'hongo-addons') => 'width-75',
    esc_html__('80%', 'hongo-addons') => 'width-80',
    esc_html__('85%', 'hongo-addons') => 'width-85',
    esc_html__('90%', 'hongo-addons') => 'width-90',
    esc_html__('95%', 'hongo-addons') => 'width-95',
    esc_html__('100%', 'hongo-addons') => 'width-100',

    esc_html__('50px', 'hongo-addons') => 'width-50px',
    esc_html__('55px', 'hongo-addons') => 'width-55px',
    esc_html__('60px', 'hongo-addons') => 'width-60px',
    esc_html__('65px', 'hongo-addons') => 'width-65px',
    esc_html__('70px', 'hongo-addons') => 'width-70px',
    esc_html__('75px', 'hongo-addons') => 'width-75px',
    esc_html__('80px', 'hongo-addons') => 'width-80px',
    esc_html__('85px', 'hongo-addons') => 'width-85px',
    esc_html__('90px', 'hongo-addons') => 'width-90px',
    esc_html__('95px', 'hongo-addons') => 'width-95px',
    esc_html__('100px', 'hongo-addons') => 'width-100px',
    esc_html__('110px', 'hongo-addons') => 'width-110px',
    esc_html__('120px', 'hongo-addons') => 'width-120px',
    esc_html__('130px', 'hongo-addons') => 'width-130px',
    esc_html__('140px', 'hongo-addons') => 'width-140px',
    esc_html__('150px', 'hongo-addons') => 'width-150px',
    esc_html__('180px', 'hongo-addons') => 'width-180px',
    esc_html__('200px', 'hongo-addons') => 'width-200px',
    esc_html__('250px', 'hongo-addons') => 'width-250px',
    esc_html__('300px', 'hongo-addons') => 'width-300px',
    esc_html__('350px', 'hongo-addons') => 'width-350px',
    esc_html__('400px', 'hongo-addons') => 'width-400px',
    esc_html__('450px', 'hongo-addons') => 'width-450px',
    esc_html__('500px', 'hongo-addons') => 'width-500px',
    esc_html__('550px', 'hongo-addons') => 'width-550px',
    esc_html__('600px', 'hongo-addons') => 'width-600px',
    esc_html__('650px', 'hongo-addons') => 'width-650px',
    esc_html__('700px', 'hongo-addons') => 'width-700px',
    esc_html__('750px', 'hongo-addons') => 'width-750px',
    esc_html__('800px', 'hongo-addons') => 'width-800px',
    esc_html__('850px', 'hongo-addons') => 'width-850px',
    esc_html__('900px', 'hongo-addons') => 'width-900px',
    esc_html__('950px', 'hongo-addons') => 'width-950px',
    esc_html__('1000px', 'hongo-addons') => 'width-1000px',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Desktop Width End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Mini Desktop Width Start */
/*-----------------------------------------------------------------------------------*/

$hongo_desktop_mini_width =array(
    esc_html__('Select Width', 'hongo-addons') => '',
    esc_html__('Auto', 'hongo-addons') => 'md-width-auto',
    esc_html__('10%', 'hongo-addons') => 'md-width-10',
    esc_html__('15%', 'hongo-addons') => 'md-width-15',
    esc_html__('20%', 'hongo-addons') => 'md-width-20',
    esc_html__('25%', 'hongo-addons') => 'md-width-25',
    esc_html__('30%', 'hongo-addons') => 'md-width-30',
    esc_html__('35%', 'hongo-addons') => 'md-width-35',
    esc_html__('40%', 'hongo-addons') => 'md-width-40',
    esc_html__('45%', 'hongo-addons') => 'md-width-45',
    esc_html__('50%', 'hongo-addons') => 'md-width-50',
    esc_html__('55%', 'hongo-addons') => 'md-width-55',
    esc_html__('60%', 'hongo-addons') => 'md-width-60',
    esc_html__('65%', 'hongo-addons') => 'md-width-65',
    esc_html__('70%', 'hongo-addons') => 'md-width-70',
    esc_html__('75%', 'hongo-addons') => 'md-width-75',
    esc_html__('80%', 'hongo-addons') => 'md-width-80',
    esc_html__('85%', 'hongo-addons') => 'md-width-85',
    esc_html__('90%', 'hongo-addons') => 'md-width-90',
    esc_html__('95%', 'hongo-addons') => 'md-width-95',
    esc_html__('100%', 'hongo-addons') => 'md-width-100',

    esc_html__('50px', 'hongo-addons') => 'md-width-50px',
    esc_html__('55px', 'hongo-addons') => 'md-width-55px',
    esc_html__('60px', 'hongo-addons') => 'md-width-60px',
    esc_html__('65px', 'hongo-addons') => 'md-width-65px',
    esc_html__('70px', 'hongo-addons') => 'md-width-70px',
    esc_html__('75px', 'hongo-addons') => 'md-width-75px',
    esc_html__('80px', 'hongo-addons') => 'md-width-80px',
    esc_html__('85px', 'hongo-addons') => 'md-width-85px',
    esc_html__('90px', 'hongo-addons') => 'md-width-90px',
    esc_html__('95px', 'hongo-addons') => 'md-width-95px',
    esc_html__('100px', 'hongo-addons') => 'md-width-100px',
    esc_html__('110px', 'hongo-addons') => 'md-width-110px',
    esc_html__('120px', 'hongo-addons') => 'md-width-120px',
    esc_html__('130px', 'hongo-addons') => 'md-width-130px',
    esc_html__('140px', 'hongo-addons') => 'md-width-140px',
    esc_html__('150px', 'hongo-addons') => 'md-width-150px',
    esc_html__('180px', 'hongo-addons') => 'md-width-180px',
    esc_html__('200px', 'hongo-addons') => 'md-width-200px',
    esc_html__('250px', 'hongo-addons') => 'md-width-250px',
    esc_html__('300px', 'hongo-addons') => 'md-width-300px',
    esc_html__('350px', 'hongo-addons') => 'md-width-350px',
    esc_html__('400px', 'hongo-addons') => 'md-width-400px',
    esc_html__('450px', 'hongo-addons') => 'md-width-450px',
    esc_html__('500px', 'hongo-addons') => 'md-width-500px',
    esc_html__('550px', 'hongo-addons') => 'md-width-550px',
    esc_html__('600px', 'hongo-addons') => 'md-width-600px',
    esc_html__('650px', 'hongo-addons') => 'md-width-650px',
    esc_html__('700px', 'hongo-addons') => 'md-width-700px',
    esc_html__('750px', 'hongo-addons') => 'md-width-750px',
    esc_html__('800px', 'hongo-addons') => 'md-width-800px',
    esc_html__('850px', 'hongo-addons') => 'md-width-850px',
    esc_html__('900px', 'hongo-addons') => 'md-width-900px',
    esc_html__('950px', 'hongo-addons') => 'md-width-950px',
    esc_html__('1000px', 'hongo-addons') => 'md-width-1000px',
);


/*-----------------------------------------------------------------------------------*/
/* Hongo Mini Desktop Width End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Ipad Width Start */
/*-----------------------------------------------------------------------------------*/

$hongo_ipad_width =array(
    esc_html__('Select Width', 'hongo-addons') => '',
    esc_html__('Auto', 'hongo-addons') => 'sm-width-auto',
    esc_html__('10%', 'hongo-addons') => 'sm-width-10',
    esc_html__('15%', 'hongo-addons') => 'sm-width-15',
    esc_html__('20%', 'hongo-addons') => 'sm-width-20',
    esc_html__('25%', 'hongo-addons') => 'sm-width-25',
    esc_html__('30%', 'hongo-addons') => 'sm-width-30',
    esc_html__('35%', 'hongo-addons') => 'sm-width-35',
    esc_html__('40%', 'hongo-addons') => 'sm-width-40',
    esc_html__('45%', 'hongo-addons') => 'sm-width-45',
    esc_html__('50%', 'hongo-addons') => 'sm-width-50',
    esc_html__('55%', 'hongo-addons') => 'sm-width-55',
    esc_html__('60%', 'hongo-addons') => 'sm-width-60',
    esc_html__('65%', 'hongo-addons') => 'sm-width-65',
    esc_html__('70%', 'hongo-addons') => 'sm-width-70',
    esc_html__('75%', 'hongo-addons') => 'sm-width-75',
    esc_html__('80%', 'hongo-addons') => 'sm-width-80',
    esc_html__('85%', 'hongo-addons') => 'sm-width-85',
    esc_html__('90%', 'hongo-addons') => 'sm-width-90',
    esc_html__('95%', 'hongo-addons') => 'sm-width-95',
    esc_html__('100%', 'hongo-addons') => 'sm-width-100',

    esc_html__('50px', 'hongo-addons') => 'sm-width-50px',
    esc_html__('55px', 'hongo-addons') => 'sm-width-55px',
    esc_html__('60px', 'hongo-addons') => 'sm-width-60px',
    esc_html__('65px', 'hongo-addons') => 'sm-width-65px',
    esc_html__('70px', 'hongo-addons') => 'sm-width-70px',
    esc_html__('75px', 'hongo-addons') => 'sm-width-75px',
    esc_html__('80px', 'hongo-addons') => 'sm-width-80px',
    esc_html__('85px', 'hongo-addons') => 'sm-width-85px',
    esc_html__('90px', 'hongo-addons') => 'sm-width-90px',
    esc_html__('95px', 'hongo-addons') => 'sm-width-95px',
    esc_html__('100px', 'hongo-addons') => 'sm-width-100px',
    esc_html__('110px', 'hongo-addons') => 'sm-width-110px',
    esc_html__('120px', 'hongo-addons') => 'sm-width-120px',
    esc_html__('130px', 'hongo-addons') => 'sm-width-130px',
    esc_html__('140px', 'hongo-addons') => 'sm-width-140px',
    esc_html__('150px', 'hongo-addons') => 'sm-width-150px',
    esc_html__('180px', 'hongo-addons') => 'sm-width-180px',
    esc_html__('200px', 'hongo-addons') => 'sm-width-200px',
    esc_html__('250px', 'hongo-addons') => 'sm-width-250px',
    esc_html__('300px', 'hongo-addons') => 'sm-width-300px',
    esc_html__('350px', 'hongo-addons') => 'sm-width-350px',
    esc_html__('400px', 'hongo-addons') => 'sm-width-400px',
    esc_html__('450px', 'hongo-addons') => 'sm-width-450px',
    esc_html__('500px', 'hongo-addons') => 'sm-width-500px',
    esc_html__('550px', 'hongo-addons') => 'sm-width-550px',
    esc_html__('600px', 'hongo-addons') => 'sm-width-600px',
    esc_html__('650px', 'hongo-addons') => 'sm-width-650px',
    esc_html__('700px', 'hongo-addons') => 'sm-width-700px',
    esc_html__('750px', 'hongo-addons') => 'sm-width-750px',
    esc_html__('800px', 'hongo-addons') => 'sm-width-800px',
    esc_html__('850px', 'hongo-addons') => 'sm-width-850px',
    esc_html__('900px', 'hongo-addons') => 'sm-width-900px',
    esc_html__('950px', 'hongo-addons') => 'sm-width-950px',
    esc_html__('1000px', 'hongo-addons') => 'sm-width-1000px',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Ipad Width End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Mobile Width Start */
/*-----------------------------------------------------------------------------------*/

$hongo_mobile_width =array(
    esc_html__('Select Width', 'hongo-addons') => '',
    esc_html__('Auto', 'hongo-addons') => 'xs-width-auto',
    esc_html__('10%', 'hongo-addons') => 'xs-width-10',
    esc_html__('15%', 'hongo-addons') => 'xs-width-15',
    esc_html__('20%', 'hongo-addons') => 'xs-width-20',
    esc_html__('25%', 'hongo-addons') => 'xs-width-25',
    esc_html__('30%', 'hongo-addons') => 'xs-width-30',
    esc_html__('35%', 'hongo-addons') => 'xs-width-35',
    esc_html__('40%', 'hongo-addons') => 'xs-width-40',
    esc_html__('45%', 'hongo-addons') => 'xs-width-45',
    esc_html__('50%', 'hongo-addons') => 'xs-width-50',
    esc_html__('55%', 'hongo-addons') => 'xs-width-55',
    esc_html__('60%', 'hongo-addons') => 'xs-width-60',
    esc_html__('65%', 'hongo-addons') => 'xs-width-65',
    esc_html__('70%', 'hongo-addons') => 'xs-width-70',
    esc_html__('75%', 'hongo-addons') => 'xs-width-75',
    esc_html__('80%', 'hongo-addons') => 'xs-width-80',
    esc_html__('85%', 'hongo-addons') => 'xs-width-85',
    esc_html__('90%', 'hongo-addons') => 'xs-width-90',
    esc_html__('95%', 'hongo-addons') => 'xs-width-95',
    esc_html__('100%', 'hongo-addons') => 'xs-width-100',

    esc_html__('50px', 'hongo-addons') => 'xs-width-50px',
    esc_html__('55px', 'hongo-addons') => 'xs-width-55px',
    esc_html__('60px', 'hongo-addons') => 'xs-width-60px',
    esc_html__('65px', 'hongo-addons') => 'xs-width-65px',
    esc_html__('70px', 'hongo-addons') => 'xs-width-70px',
    esc_html__('75px', 'hongo-addons') => 'xs-width-75px',
    esc_html__('80px', 'hongo-addons') => 'xs-width-80px',
    esc_html__('85px', 'hongo-addons') => 'xs-width-85px',
    esc_html__('90px', 'hongo-addons') => 'xs-width-90px',
    esc_html__('95px', 'hongo-addons') => 'xs-width-95px',
    esc_html__('100px', 'hongo-addons') => 'xs-width-100px',
    esc_html__('110px', 'hongo-addons') => 'xs-width-110px',
    esc_html__('120px', 'hongo-addons') => 'xs-width-120px',
    esc_html__('130px', 'hongo-addons') => 'xs-width-130px',
    esc_html__('140px', 'hongo-addons') => 'xs-width-140px',
    esc_html__('150px', 'hongo-addons') => 'xs-width-150px',
    esc_html__('180px', 'hongo-addons') => 'xs-width-180px',
    esc_html__('200px', 'hongo-addons') => 'xs-width-200px',
    esc_html__('250px', 'hongo-addons') => 'xs-width-250px',
    esc_html__('300px', 'hongo-addons') => 'xs-width-300px',
    esc_html__('350px', 'hongo-addons') => 'xs-width-350px',
    esc_html__('400px', 'hongo-addons') => 'xs-width-400px',
    esc_html__('450px', 'hongo-addons') => 'xs-width-450px',
    esc_html__('500px', 'hongo-addons') => 'xs-width-500px',
    esc_html__('550px', 'hongo-addons') => 'xs-width-550px',
    esc_html__('600px', 'hongo-addons') => 'xs-width-600px',
    esc_html__('650px', 'hongo-addons') => 'xs-width-650px',
    esc_html__('700px', 'hongo-addons') => 'xs-width-700px',
    esc_html__('750px', 'hongo-addons') => 'xs-width-750px',
    esc_html__('800px', 'hongo-addons') => 'xs-width-800px',
    esc_html__('850px', 'hongo-addons') => 'xs-width-850px',
    esc_html__('900px', 'hongo-addons') => 'xs-width-900px',
    esc_html__('950px', 'hongo-addons') => 'xs-width-950px',
    esc_html__('1000px', 'hongo-addons') => 'xs-width-1000px',
);

/*-----------------------------------------------------------------------------------*/
/* Hongo Mobile Width End */
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Hongo Single Image Function End */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_vc_get_shared' ) ) {
    function hongo_vc_get_shared( $asset = '' ) {
        switch ( $asset ) {
            case 'colors':
                $asset = VcSharedLibrary::getColors();
                break;

            case 'colors-dashed':
                $asset = VcSharedLibrary::getColorsDashed();
                break;

            case 'icons':
                $asset = VcSharedLibrary::getIcons();
                break;

            case 'sizes':
                $asset = VcSharedLibrary::getSizes();
                break;

            case 'button styles':
            case 'alert styles':
                $asset = VcSharedLibrary::getButtonStyles();
                break;
            case 'message_box_styles':
                $asset = VcSharedLibrary::getMessageBoxStyles();
                break;
            case 'cta styles':
                $asset = VcSharedLibrary::getCtaStyles();
                break;

            case 'text align':
                $asset = VcSharedLibrary::getTextAlign();
                break;

            case 'cta widths':
            case 'separator widths':
                $asset = VcSharedLibrary::getElementWidths();
                break;

            case 'separator styles':
                $asset = VcSharedLibrary::getSeparatorStyles();
                break;

            case 'separator border widths':
                $asset = VcSharedLibrary::getBorderWidths();
                break;

            case 'single image styles':
                $asset = VcSharedLibrary::getBoxStyles();
                break;

            case 'single image external styles':
                $asset = VcSharedLibrary::getBoxStyles( array(
                    'default',
                    'round',
                ) );
                break;

            case 'toggle styles':
                $asset = VcSharedLibrary::getToggleStyles();
                break;

            case 'target param list':
				$asset = VcSharedLibrary::get_target_param_list();
				break;

            case 'animation styles':
                $asset = VcSharedLibrary::getAnimationStyles();
                break;
        }

        return $asset;
    }
}

if ( ! function_exists( 'hongogetImageSquareSize' ) ) {
    function hongogetImageSquareSize( $img_id, $img_size ) {
        if ( preg_match_all( '/(\d+)x(\d+)/', $img_size, $sizes ) ) {
            $exact_size = array(
                'width' => isset( $sizes[1][0] ) ? $sizes[1][0] : '0',
                'height' => isset( $sizes[2][0] ) ? $sizes[2][0] : '0',
            );
        } else {
            $image_downsize = image_downsize( $img_id, $img_size );
            $exact_size = array(
                'width' => $image_downsize[1],
                'height' => $image_downsize[2],
            );
        }
        $exact_size_int_w = (int) $exact_size['width'];
        $exact_size_int_h = (int) $exact_size['height'];
        if ( isset( $exact_size['width'] ) && $exact_size_int_w !== $exact_size_int_h ) {
            $img_size = $exact_size_int_w > $exact_size_int_h ? $exact_size['height'] . 'x' . $exact_size['height'] : $exact_size['width'] . 'x' . $exact_size['width'];
        }

        return $img_size;
    }
}

if ( ! function_exists( 'hongo_vc_extract_dimensions' ) ) {
    function hongo_vc_extract_dimensions( $dimensions ) {
        $dimensions = str_replace( ' ', '', $dimensions );
        $matches = null;

        if ( preg_match( '/(\d+)x(\d+)/', $dimensions, $matches ) ) {
            return array(
                $matches[1],
                $matches[2],
            );
        }

        return false;
    }
}

/*-----------------------------------------------------------------------------------*/
/* Hongo Single Image Function End */
/*-----------------------------------------------------------------------------------*/