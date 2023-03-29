//All CSS fFILES
import '../css/styles.css'
import '../css/menu.css'
import '../css/bootstrap.min.css'
import '../css/default.css'
import '../css/slick.css'
import '../css/owl.carousel.min.css'
import '../css/owl-carousel.css'
import '../css/lightcase.css'
import '../css/magnific-popup.css'
import '../css/swiper.min.css'
import '../css/animate.css'
import '../css/dashbord-mobile-menu.css'
import '../css/search.css'
import '../css/fontawesome-5-all.min.css'
import '../css/font-awesome.min.css'
import '../css/fontawesome-all.min.css'
import '../css/jquery-ui.css'


import $ from "jquery";
import { Model } from "survey-jquery";
import "survey-jquery/defaultV2.min.css";
import { json } from '../js/custom/json';

const survey = new Model(json);
survey.onComplete.add((sender, options) => {
    console.log(JSON.stringify(sender.data, null, 3));
});

$("#surveyElement").Survey({ model: survey });

const sig = new Model(json);
sig.onComplete.add((sender, options) => {
    console.log(JSON.stringify(sender.data, null, 3));
});

$("#surveySig").Survey({ model: sig });



