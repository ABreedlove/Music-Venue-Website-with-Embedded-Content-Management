
@charset "UTF-8";
/*=== MEDIA QUERY ===*/
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Volkhov:ital@1&display=swap");
body {
  line-height: 1.65;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
}


<?php 

require_once "../php/config.php";

echo "THIS IS PHP STYLESEET";

function renderContent($db, $id, $col) {

	$column = "post_" . $col;

	$sql = "SELECT * FROM venue_database.posts WHERE ID = " . $id;

	if($stmt = $db->query($sql))
	{

		while($row = $stmt->fetch_assoc()) 
		{
				echo $row[$column];
		}	
	}
	else 
	{
		echo "Could Not Retrieve";
	}
}

?>

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Roboto", sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 400;
}

h1 {
  font-size: 40px;
}

h2 {
  font-size: 28px;
}

h3 {
  font-size: 20px;
}

h4 {
  font-size: 18px;
}

p {
  color: #7B7B7B;
  font-size: 15px;
  font-family: "Roboto", sans-serif;
  line-height: 1.7;
}

ol,
ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

iframe {
  border: 0;
}

a,
a:focus,
a:hover {
  text-decoration: none;
  outline: 0;
  color: #655E7A;
}

blockquote {
  font-size: 18px;
  border-left: 5px solid #655E7A;
  padding: 20px 40px;
  text-align: left;
  color: #777;
}

.navbar-toggle .icon-bar {
  background: #655E7A;
}

input[type=email],
input[type=password],
input[type=text],
input[type=tel] {
  box-shadow: none;
  height: 45px;
  outline: none;
  font-size: 14px;
}
input[type=email]:focus,
input[type=password]:focus,
input[type=text]:focus,
input[type=tel]:focus {
  box-shadow: none;
  border: 1px solid #655E7A;
}

.form-control {
  box-shadow: none;
  border-radius: 0;
}
.form-control:focus {
  box-shadow: none;
  border: 1px solid #655E7A;
}

.slick-slide {
  outline: 0;
}

.btn-main, .btn-small, .btn-transparent {
  background: #655E7A;
  color: #fff;
  display: inline-block;
  font-size: 14px;
  letter-spacing: 1px;
  padding: 14px 35px;
  text-transform: uppercase;
  border-radius: 0;
  transition: all 0.2s ease;
}
.btn-main.btn-icon i, .btn-icon.btn-small i, .btn-icon.btn-transparent i {
  font-size: 16px;
  vertical-align: middle;
  margin-right: 5px;
}
.btn-main:hover, .btn-small:hover, .btn-transparent:hover {
  background: #353240;
  color: #fff;
}

.btn-solid-border {
  border: 1px solid #fff;
  background: transparent;
  color: #fff;
}
.btn-solid-border:hover {
  border: 1px solid #655E7A;
  background: #655E7A;
}

.btn-transparent {
  background: transparent;
  padding: 0;
  color: #655E7A;
}
.btn-transparent:hover {
  background: transparent;
  color: #655E7A;
}

.btn-large {
  padding: 20px 45px;
}
.btn-large.btn-icon i {
  font-size: 16px;
  vertical-align: middle;
  margin-right: 5px;
}

.btn-small {
  padding: 10px 25px;
  font-size: 12px;
}

.btn-round {
  border-radius: 4px;
}

.btn-round-full {
  border-radius: 50px;
}

.btn.active.focus,
.btn:active:focus,
.btn:focus {
  outline: 0;
  box-shadow: none;
}

.mt-10 {
  margin-top: 20px;
}

.mt-20 {
  margin-top: 20px;
}

.mt-30 {
  margin-top: 30px;
}

.mt-40 {
  margin-top: 40px;
}

.mt-50 {
  margin-top: 50px;
}

.btn:focus {
  color: #ddd;
}

.w-100 {
  width: 100%;
}

.margin-0 {
  margin: 0 !important;
}

#preloader {
  background: #fff;
  height: 100%;
  left: 0;
  opacity: 1;
  filter: alpha(opacity=100);
  position: fixed;
  text-align: center;
  top: 0;
  width: 100%;
  z-index: 999999999;
}

.bg-shadow {
  background-color: #fff;
  box-shadow: 0 16px 24px rgba(0, 0, 0, 0.08);
  padding: 20px;
}

.bg-gray {
  background: #f9f9f9;
}

.bg-primary {
  background: #655E7A !important;
}

.bg-primary-dark {
  background: #4d485d !important;
}

.bg-primary-darker {
  background: #353240 !important;
}

.bg-dark {
  background: #202122 !important;
}

.section {
  padding: 100px 0;
}

.section-sm {
  padding: 70px 0;
}

.title {
  padding: 20px 0 30px;
}
.title h2 {
  font-size: 18px;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.section-title {
  margin-bottom: 70px;
}
.section-title h2 {
  text-transform: uppercase;
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 20px;
}
.section-title p {
  font-style: italic;
  color: #666;
  font-family: "Volkhov", serif;
}

.section-subtitle {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 30px;
}

.page-title {
  padding: 100px 0;
}
.page-title .block {
  text-align: center;
}
.page-title .block h1 {
  color: #fff;
  font-weight: 200;
  letter-spacing: 6px;
  margin-top: 0;
  text-transform: capitalize;
  margin-bottom: 20px;
}
@media (max-width: 992px) {
  .page-title .block h1 {
    font-size: 32px;
  }
}
.page-title .block p {
  color: #fff;
  font-weight: 300;
  margin-bottom: 0;
}

.heading {
  padding-bottom: 60px;
  text-align: center;
}
.heading h2 {
  color: #000;
  font-size: 30px;
  line-height: 40px;
  font-weight: 400;
}
.heading p {
  font-size: 18px;
  line-height: 40px;
  color: #292929;
  font-weight: 300;
}

.page-wrapper {
  padding: 70px 0;
}

.social-media-icons ul li {
  display: inline-block;
}
.social-media-icons ul li a {
  font-size: 18px;
  color: #333;
  display: inline-block;
  padding: 7px 12px;
  color: #fff;
}
.social-media-icons ul li .twitter {
  background: #00aced;
}
.social-media-icons ul li .facebook {
  background: #3b5998;
  padding: 7px 18px;
}
.social-media-icons ul li .googleplus {
  background: #dd4b39;
}
.social-media-icons ul li .dribbble {
  background: #ea4c89;
}
.social-media-icons ul li .instagram {
  background: #bc2a8d;
}

.dropdown-slide {
  position: static;
}
.dropdown-slide .open > a,
.dropdown-slide .open > a:focus,
.dropdown-slide .open > a:hover {
  background: transparent;
}
.dropdown-slide.full-width .dropdown-menu {
  left: 0 !important;
  right: 0 !important;
}
.dropdown-slide:hover .dropdown-menu {
  display: none;
  opacity: 1;
  display: block;
  transform: translate(0px, 0px);
  opacity: 1;
  visibility: visible;
  color: #777;
  transform: translateY(0px);
}
.dropdown-slide .dropdown-menu {
  border-radius: 0;
  opacity: 1;
  visibility: visible;
  position: absolute;
  padding: 15px;
  border: 1px solid #ebebeb;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  position: absolute;
  display: block;
  visibility: hidden;
  opacity: 0;
  transform: translateY(30px);
  transition: visibility 0.2s, opacity 0.2s, transform 500ms cubic-bezier(0.43, 0.26, 0.11, 0.99);
}
@media (max-width: 480px) {
  .dropdown-slide .dropdown-menu {
    transform: none;
  }
}

.commonSelect {
  margin-left: 10px;
  padding-right: 6px;
  position: relative;
}

.commonSelect select {
  -webkit-appearance: none;
  -moz-appearance: none;
  cursor: pointer;
  border: none;
  padding: 0;
  height: auto;
  color: #555;
}
.commonSelect select:focus {
  box-shadow: none;
  border: none;
}

.tabCommon .nav-tabs {
  border-bottom: 0;
  margin-bottom: 10px;
}
.tabCommon .nav-tabs li {
  margin-right: 5px;
}
.tabCommon .nav-tabs li a.active {
  background-color: #655E7A;
  border: 1px solid #655E7A;
  color: #ffffff;
}
.tabCommon .nav-tabs a {
  border-radius: 0;
  background: #f9f9f9;
}
.tabCommon .nav-tabs a:hover {
  border: 1px solid transparent;
  background: #655E7A;
  color: #fff;
}
.tabCommon .tab-content {
  padding: 20px;
  border: 1px solid #dedede;
}
.tabCommon .tab-content p {
  margin-bottom: 0;
}

.commonAccordion .panel, .commonAccordion-2 .panel {
  border-radius: 0;
  box-shadow: none;
}
.commonAccordion .panel .panel-heading, .commonAccordion-2 .panel .panel-heading {
  background: transparent;
  padding: 0;
}
.commonAccordion .panel .panel-title, .commonAccordion-2 .panel .panel-title {
  position: relative;
}
.commonAccordion .panel .panel-title a, .commonAccordion-2 .panel .panel-title a {
  display: block;
  font-size: 14px;
  text-transform: uppercase;
  padding: 10px 10px;
}
.commonAccordion .panel .panel-title a:before, .commonAccordion-2 .panel .panel-title a:before {
  color: #555;
  content: "\f209";
  position: absolute;
  right: 25px;
}
.commonAccordion .panel .panel-title a.collapsed:before, .commonAccordion-2 .panel .panel-title a.collapsed:before {
  content: "\f217";
}

.list-circle {
  padding-left: 20px;
}
.list-circle li {
  list-style-type: circle;
}

.play-icon {
  border: 1px solid #dedede;
  display: inline-block;
  width: 60px;
  height: 60px;
  border-radius: 50px;
  font-size: 30px;
}
.play-icon i {
  line-height: 60px;
}

.alert-common {
  border-radius: 0;
  border-width: 2px;
}
.alert-common i {
  margin: 0 5px;
  font-size: 16px;
}

.alert-solid {
  background: transparent;
  color: #655E7A;
}

@media (max-width: 480px) {
  .buttonPart li {
    margin-bottom: 8px;
  }
}
@media (max-width: 768px) {
  .buttonPart li {
    margin-bottom: 8px;
  }
}

.overly, .slider, .page-title {
  position: relative;
}
.overly:before, .slider:before, .page-title:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background: #1d192c;
  opacity: 0.8;
}

.owl-dots .owl-dot.active span,
.owl-theme .owl-dots .owl-dot:hover span {
  background: #655E7A !important;
}

#success,
#error {
  display: none;
}

#wrapper-work {
  overflow: hidden;
  padding-top: 100px;
}
#wrapper-work ul li {
  width: 50%;
  float: left;
  position: relative;
}
#wrapper-work ul li img {
  width: 100%;
  height: 100%;
}
#wrapper-work ul li .items-text {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  color: #fff;
  background: rgba(0, 0, 0, 0.6);
  padding-left: 44px;
  padding-top: 140px;
}
#wrapper-work ul li .items-text h2 {
  padding-bottom: 28px;
  padding-top: 75px;
  position: relative;
}
#wrapper-work ul li .items-text h2:before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 75px;
  height: 3px;
  background: #fff;
}
#wrapper-work ul li .items-text p {
  padding-top: 30px;
  font-size: 16px;
  line-height: 27px;
  font-weight: 300;
  padding-right: 80px;
}

/*--
	features-work Start 
--*/
#features-work {
  padding-top: 50px;
  padding-bottom: 75px;
}
#features-work .block ul li {
  width: 19%;
  text-align: center;
  display: inline-block;
  padding: 40px 0px;
}

/*--
	Header Start 
--*/
header {
  background: #fff;
  padding: 20px 0;
}
header .navbar {
  margin-bottom: 0px;
  border: 0px;
}
header .navbar-brand {
  padding-top: 5px;
}
header .navbar-default {
  background: none;
  border: 0px;
}
header .navbar-default .navbar-nav {
  padding-top: 10px;
}
header .navbar-default .navbar-nav li a {
  color: #333333;
  padding: 10px 26px;
  font-size: 15px;
}
header .navbar-default .navbar-nav li a:hover {
  color: #000;
}

.navigation {
  background: #fff;
  padding: 20px 0;
}
.navigation .navbar {
  margin-bottom: 0px;
  border: 0px;
}
.navigation .navbar-brand {
  padding-top: 5px;
}
.navigation .navbar-toggler {
  font-size: 36px;
}
.navigation .navbar-toggler:focus {
  outline: 0;
}
.navigation .navbar {
  background: none;
  border: 0px;
}
.navigation .navbar .navbar-nav {
  padding-top: 10px;
}
@media (max-width: 992px) {
  .navigation .navbar .navbar-nav {
    text-align: center;
  }
}
.navigation .navbar .navbar-nav > li > a {
  color: #5C5C5C;
  padding: 10px 15px;
  font-weight: 500;
  font-size: 14px;
  text-transform: uppercase;
  transition: 0.3s;
}
.navigation .navbar .navbar-nav > li > a:hover, .navigation .navbar .navbar-nav > li > a:focus {
  color: #000;
  background: transparent;
}
.navigation .navbar .navbar-nav li.active > a {
  text-decoration: underline;
  color: #655E7A;
}
.navigation .navbar .dropdown-menu {
  border-radius: 0;
  border: none;
  box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.08);
  padding: 0;
}
@media (max-width: 992px) {
  .navigation .navbar .dropdown-menu {
    text-align: center;
    float: left !important;
    width: 100%;
    margin: 0;
  }
}
.navigation .navbar .dropdown-menu li:first-child {
  margin-top: 10px;
}
.navigation .navbar .dropdown-menu li:last-child {
  margin-bottom: 10px;
}
.navigation .navbar .dropdown-menu a {
  font-weight: normal;
  color: #808080;
  padding: 10px 20px;
  transition: all 0.3s ease;
}
.navigation .navbar .dropdown-menu a:focus, .navigation .navbar .dropdown-menu a:hover {
  background: #655E7A;
  color: #fff;
}

.dropdown-toggle::after {
  display: none;
}

.dropleft .dropdown-menu,
.dropright .dropdown-menu {
  margin: 0;
}

.dropleft .dropdown-toggle::before,
.dropright .dropdown-toggle::after {
  font-weight: bold;
  font-family: "Ionicons";
  border: 0;
  font-size: 10px;
  vertical-align: 1px;
}

.dropleft .dropdown-toggle::before {
  content: "\f3d2";
  margin-right: 7px;
}

.dropright .dropdown-toggle::after {
  content: "\f3d3";
  margin-left: 7px;
}

.dropdown-item {
  padding: 0.8rem 1.5rem;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 500;
}
@media (max-width: 992px) {
  .dropdown-item {
    padding: 0.6rem 1.5rem;
  }
}

.dropdown-submenu:hover > .dropdown-item,
.dropdown-item:hover {
  background: #655E7A;
  color: #fff !important;
}

.dropdown-item.active {
  text-decoration: underline;
  background-color: transparent;
  color: inherit;
}

.dropdown-submenu.active > .dropdown-toggle {
  text-decoration: underline;
  color: inherit;
}

ul.dropdown-menu li {
  padding-left: 0px !important;
}

@media (min-width: 992px) {
  .dropdown-menu {
    transition: all 0.2s ease-in, visibility 0s linear 0.2s, transform 0.2s linear;
    display: block;
    visibility: hidden;
    opacity: 0;
    min-width: 200px;
  }
  .dropdown-menu li:first-child {
    margin-top: 10px;
  }
  .dropdown-menu li:last-child {
    margin-bottom: 10px;
  }
  .dropleft .dropdown-menu,
.dropright .dropdown-menu {
    margin-top: -10px;
  }
  .dropdown:hover > .dropdown-menu {
    visibility: visible;
    transition: all 0.45s ease 0s;
    opacity: 1;
  }
}
.slider {
  background: url(<?php renderContent($db, 0, "img"); ?>);
  background-size: cover;
  background-attachment: fixed;
  background-position: 20% 35%;
  padding: 200px 0;
  position: relative;
}
@media (max-width: 992px) {
  .slider {
    padding: 150px 0;
  }
}
.slider .block {
  color: #E3E3E4;
  text-align: center;
}
.slider .block h1 {
  font-weight: 100;
  font-size: 45px;
  line-height: 60px;
  letter-spacing: 10px;
  padding-bottom: 15px;
  text-transform: uppercase;
}
@media (max-width: 992px) {
  .slider .block h1 {
    font-size: 36px;
    line-height: 46px;
  }
}
@media (max-width: 768px) {
  .slider .block h1 {
    font-size: 32px;
    line-height: 42px;
  }
}
.slider .block p {
  margin-bottom: 30px;
  color: #b9b9b9;
  font-size: 18px;
  line-height: 27px;
  font-weight: 300;
}
@media (max-width: 992px) {
  .slider .block p {
    font-size: 16px;
  }
}

.call-to-action {
  padding: 70px 0px;
  text-align: center;
}
.call-to-action h2 {
  color: #fff;
}
.call-to-action p {
  color: #fff;
}
.call-to-action .btn-main, .call-to-action .btn-transparent, .call-to-action .btn-small {
  padding: 15px 35px;
  font-size: 12px;
  margin-top: 30px;
}

.service {
  text-align: center;
  padding: 90px 0;
}
.service .service-item {
  padding-bottom: 30px;
}
.service .service-item i {
  font-size: 60px;
  color: #655E7A;
}
.service .service-item h4 {
  padding-top: 15px;
  margin: 0;
  font-weight: 500;
  text-transform: uppercase;
}
.service .service-item p {
  padding-top: 10px;
  margin: 0;
}

.dark-service .title {
  color: #fff;
}
.dark-service .service-item {
  text-align: center;
  padding: 0 10px;
  padding-top: 30px;
}
@media (max-width: 480px) {
  .dark-service .service-item {
    padding: 0;
    padding-top: 30px;
  }
}
.dark-service .service-item i {
  font-size: 50px;
  color: #fff;
}
.dark-service .service-item h4 {
  color: #fff;
  padding-top: 15px;
  margin: 0;
  font-weight: 500;
  text-transform: uppercase;
  margin-bottom: 5px;
}
.dark-service .service-item p {
  padding-top: 10px;
  margin: 0;
}

.service-about p {
  line-height: 28px;
}

.service-arrow .block {
  padding: 70px 30px;
  text-align: center;
}
@media (max-width: 480px) {
  .service-arrow .block {
    padding: 60px 10px;
  }
}
.service-arrow .block i {
  font-size: 40px;
  display: inline-block;
  margin-bottom: 15px;
}
.service-arrow .block p {
  color: #fff;
  margin-bottom: 0;
}
.service-arrow .block h3 {
  font-size: 24px;
}

.service-list .block {
  padding: 30px;
  margin-bottom: 20px;
  background: #fff;
}
@media (max-width: 480px) {
  .service-list .block {
    padding: 30px 20px;
  }
}
.service-list .block p {
  margin-bottom: 0;
}

.feature {

  background-position: 50% 94px;
  display: block;
  position: relative;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  padding: 100px 0;
}
@media (max-width: 768px) {
  .feature {
    background-image: none !important;
    background-color: #F2F2F2 !important;
  }
}
.feature h2 {
  margin-bottom: 30px;
}
.feature p {
  color: #ffffff;
  margin-bottom: 20px;
}
.feature .btn-view-works {
  background: #655E7A;
  color: #fff;
  padding: 10px 20px;
}

.portfolio-work {
  padding: 80px 0;
}
.portfolio-work .block .portfolio-menu {
  text-align: center;
}
.portfolio-work .block .portfolio-menu .btn-group {
  margin-bottom: 40px;
}
@media (max-width: 992px) {
  .portfolio-work .block .portfolio-menu .btn-group {
    display: block;
  }
}
.portfolio-work .block .portfolio-menu .btn-group label {
  display: inline-block;
  border: 1px solid #dedede;
  padding: 8px 25px;
  cursor: pointer;
  font-size: 15px;
  color: #333333;
  outline: 0;
  background: #fff;
  margin: 3px 2px;
  border-radius: 0;
  transition: all 0.3s ease;
}
.portfolio-work .block .portfolio-menu .btn-group label.active {
  background-color: #655E7A;
  border-color: #655E7A;
  color: #fff;
}

.portfolio-item {
  position: relative;
  padding: 0;
}
.portfolio-item img {
  width: 100%;
  height: auto;
}
.portfolio-item:hover .portfolio-hover {
  visibility: visible;
  opacity: 1;
}
.portfolio-item:hover .portfolio-content {
  transform: translateY(-50%);
}
.portfolio-hover {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  background: rgba(60, 55, 55, 0.5);
  visibility: hidden;
  opacity: 0;
  transition: 0.3s ease;
}
.portfolio-content {
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-40%);
  text-align: center;
  padding: 20px;
  transition: inherit;
}
.portfolio-content * {
  color: #fff;
}
.portfolio-content a {
  display: block;
  transition: 0.2s ease;
}
.portfolio-content a:hover {
  color: #fff;
  opacity: 0.8;
}
.portfolio-content a i {
  font-size: 30px;
}
.portfolio-content a.h3 {
  margin-top: 0;
}

.portfolio-single-page .project-details h4 {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 2px dashed #dedede;
}
.portfolio-single-page .project-details span {
  color: #838383;
  width: 180px;
  display: inline-block;
}
.portfolio-single-page .project-details strong {
  color: #313131;
  font-weight: normal;
}
.portfolio-single-page .project-details ul li {
  margin-bottom: 10px;
}

.portfolio-single-slider {
  cursor: -webkit-grab;
  cursor: grab;
}

.testimonial {
  padding: 100px 0;
}
.testimonial .block h2 {
  line-height: 27px;
  color: #5C5C5C;
  padding-top: 110px;
}
.testimonial .block p {
  padding-top: 50px;
  color: #7B7B7B;
}
.testimonial .counter-box li {
  width: 50%;
  float: left;
  text-align: center;
  margin: 30px 0 30px;
}
.testimonial .testimonial-carousel {
  border: 1px solid #dedede;
  padding: 24px;
}
.testimonial .testimonial-carousel i {
  font-size: 35px;
}
.testimonial .testimonial-carousel p {
  font-family: "Volkhov", serif;
  line-height: 28px;
  padding-bottom: 20px;
}
.testimonial .testimonial-carousel .user img {
  padding-bottom: 0px;
  border-radius: 500px;
  width: 80px;
  display: inline-block;
}
.testimonial .testimonial-carousel .user p {
  font-family: "Roboto", sans-serif;
  padding-bottom: 0;
  margin-top: 6px;
  font-size: 12px;
  line-height: 20px;
}
.testimonial .testimonial-carousel .user p span {
  display: block;
  color: #353241;
  font-weight: 600;
}
.testimonial .testimonial-carousel .owl-carousel .owl-pagination div {
  border: 1px solid #1D1D1D;
  border-radius: 500px;
  display: inline-block;
  height: 10px;
  margin-right: 15px;
  width: 10px;
}
.testimonial .testimonial-carousel .owl-carousel .owl-pagination div.active {
  background: #5C5C5C;
  font-size: 30px;
  display: inline-block;
  border: 0px;
}

.counter-box i {
  font-size: 35px;
}
.counter-box h4 {
  font-size: 30px;
  font-weight: bold;
}
.counter-box span {
  color: #555;
}

.contact-form {
  padding-top: 70px;
  padding-bottom: 35px;
}
.contact-form .block .form-group {
  padding-bottom: 15px;
  margin: 0px;
}
.contact-form .block .form-group .form-control {
  background: #F6F8FA;
  height: 60px;
  padding: 10px 20px;
  border: 1px solid #EEF2F6;
  box-shadow: none;
  width: 100%;
}
.contact-form .block .form-group-2 {
  margin-bottom: 13px;
}
.contact-form .block .form-group-2 textarea {
  background: #F6F8FA;
  height: 135px;
  border: 1px solid #EEF2F6;
  box-shadow: none;
  width: 100%;
  padding: 15px 20px;
}
.contact-form .block button {
  width: 100%;
  height: 60px;
  background: #47424C;
  border: none;
  color: #fff;
  font-size: 18px;
}

.address-block li {
  margin-bottom: 10px;
}
.address-block li i {
  margin-right: 15px;
  font-size: 20px;
  width: 20px;
}

.social-icons {
  margin-top: 40px;
}
.social-icons li {
  display: inline-block;
  margin: 0 6px;
}
.social-icons a {
  display: inline-block;
}
.social-icons i {
  color: #2C2C2C;
  margin-right: 25px;
  font-size: 25px;
}

.google-map {
  position: relative;
}

.google-map .map {
  width: 100%;
  height: 300px;
}

.contact-box {
  padding-top: 35px;
  padding-bottom: 58px;
}
.contact-box .block img {
  width: 100%;
}
.contact-box .block h2 {
  font-weight: 300;
  color: #000;
  font-size: 28px;
  padding-bottom: 30px;
}
.contact-box .block p {
  color: #5C5C5C;
  display: block;
}

/*=================================================================
  Pricing section
==================================================================*/
.pricing-table .pricing-item {
  padding: 40px 20px;
  background: #fff;
  box-shadow: 0 8px 15px 0 rgba(5, 57, 106, 0.06);
}
.pricing-table .pricing-item a.btn-main, .pricing-table .pricing-item a.btn-transparent, .pricing-table .pricing-item a.btn-small {
  text-transform: uppercase;
  margin-top: 20px;
}
.pricing-table .pricing-item li {
  font-weight: 400;
  padding: 6px 0;
  color: #666;
}
.pricing-table .pricing-item li i {
  margin-right: 6px;
  color: #655E7A;
}
.pricing-table .price-title {
  padding: 30px 0 20px;
}
.pricing-table .price-title > h3 {
  font-weight: 700;
  margin: 0 0 5px;
  font-size: 15px;
  text-transform: uppercase;
}
.pricing-table .price-title > p {
  font-size: 14px;
  font-weight: 400;
  line-height: 18px;
  margin-top: 5px;
}
.pricing-table .price-title .value {
  color: #655E7A;
  font-size: 50px;
  padding: 10px 0;
}

.product-item {
  margin-bottom: 30px;
}
.product-item .product-thumb {
  position: relative;
}
.product-item .product-thumb img {
  width: 100%;
  height: auto;
}
.product-item .product-thumb .bage {
  position: absolute;
  top: 12px;
  right: 12px;
  background: #000;
  color: #fff;
  font-size: 12px;
  padding: 4px 12px;
  font-weight: 300;
  display: inline-block;
}
.product-item .product-thumb:before {
  transition: 0.3s all;
  opacity: 0;
  background: rgba(0, 0, 0, 0.6);
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
}
.product-item .product-thumb .preview-meta {
  position: absolute;
  text-align: center;
  bottom: 0;
  left: 0;
  width: 100%;
  justify-content: center;
  opacity: 0;
  transition: 0.2s;
  transform: translateY(10px);
}
.product-item .product-thumb .preview-meta li {
  display: inline-block;
}
.product-item .product-thumb .preview-meta li a,
.product-item .product-thumb .preview-meta li span {
  background: #fff;
  padding: 10px 16px;
  cursor: pointer;
  display: inline-block;
  font-size: 18px;
}
.product-item .product-thumb .preview-meta li a:hover,
.product-item .product-thumb .preview-meta li span:hover {
  background: #655E7A;
  color: #fff;
}
.product-item:hover .product-thumb:before {
  opacity: 1;
}
.product-item:hover .preview-meta {
  opacity: 1;
  transform: translateY(-20px);
}
.product-item .product-content {
  text-align: center;
}
.product-item .product-content h4 {
  font-size: 14px;
  font-weight: 400;
  margin-top: 15px;
  margin-bottom: 6px;
}
.product-item .product-content h4 a {
  color: #000;
}

.product-modal {
  background: rgba(255, 255, 255, 0.9);
  text-align: center;
  padding: 0 !important;
}
.product-modal:before {
  content: "";
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}
.product-modal.fade .modal-dialog {
  transform: translate(0, 0);
}
.product-modal .close {
  width: 50px;
  float: none;
  position: absolute;
  right: 20px;
  z-index: 9;
  top: 20px;
  font-size: 30px;
  outline: none;
}
.product-modal .modal-dialog {
  width: 900px;
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
@media (max-width: 480px) {
  .product-modal .modal-dialog {
    width: 100%;
  }
}
@media (max-width: 768px) {
  .product-modal .modal-dialog {
    width: 100%;
  }
}
.product-modal .modal-content {
  border-radius: 0;
  box-shadow: none;
  border: none;
}
.product-modal .modal-content .modal-body {
  padding: 30px;
}
.product-modal .modal-content .modal-body .modal-image img {
  width: 100%;
  height: auto;
}
.product-modal .modal-content .modal-body .product-short-details h2 {
  margin-top: 0;
  font-size: 22px;
  font-weight: 400;
}
.product-modal .modal-content .modal-body .product-short-details h2 a {
  color: #000;
}
@media (max-width: 480px) {
  .product-modal .modal-content .modal-body .product-short-details h2 {
    margin-top: 15px;
  }
}
@media (max-width: 768px) {
  .product-modal .modal-content .modal-body .product-short-details h2 {
    margin-top: 15px;
  }
}
.product-modal .modal-content .modal-body .product-short-details .product-price {
  font-size: 30px;
  margin: 20px 0;
}
@media (max-width: 480px) {
  .product-modal .modal-content .modal-body .product-short-details .product-price {
    margin: 10px 0;
  }
}
.product-modal .modal-content .modal-body .product-short-details .btn-main, .product-modal .modal-content .modal-body .product-short-details .btn-transparent, .product-modal .modal-content .modal-body .product-short-details .btn-small {
  margin-top: 20px;
}
.product-modal .modal-content .modal-body .product-short-details .btn-transparent {
  color: #444;
  border-bottom: 1px solid #dedede;
}

.product-shorting {
  margin-bottom: 30px;
}
.product-shorting span {
  margin-right: 15px;
}

.product-category ul {
  padding-left: 15px;
}
.product-category ul li {
  margin-bottom: 4px;
}
.product-category ul li a {
  color: #666;
}
.product-category ul li a:hover {
  color: #000;
}

.single-product {
  padding: 60px 0 40px;
}
.single-product .breadcrumb {
  background: transparent;
}
.single-product .breadcrumb li {
  color: #000;
  font-weight: 200;
}
.single-product .breadcrumb li a {
  color: #000;
  font-weight: 200;
}
.single-product .product-pagination li {
  display: inline-block;
  margin: 0 8px;
}
.single-product .product-pagination li + li:before {
  padding: 0 8px 0 0;
  color: #ccc;
  content: "/ ";
}
.single-product .product-pagination li a {
  color: #000;
  font-weight: 200;
}
.single-product .product-pagination li a i {
  vertical-align: middle;
}

.single-product-slider .carousel .carousel-inner .carousel-caption {
  text-shadow: none;
  text-align: left;
  top: 20%;
  bottom: auto;
}
.single-product-slider .carousel .carousel-inner .carousel-caption h1 {
  font-size: 50px;
  font-weight: 100;
  color: #000;
}
.single-product-slider .carousel .carousel-inner .carousel-caption p {
  width: 50%;
  font-weight: 200;
}
.single-product-slider .carousel .carousel-inner .carousel-caption .btn-main, .single-product-slider .carousel .carousel-inner .carousel-caption .btn-transparent, .single-product-slider .carousel .carousel-inner .carousel-caption .btn-small {
  margin-top: 20px;
}
.single-product-slider .carousel .carousel-control {
  bottom: auto;
  background: #fff;
  width: 6%;
  padding: 10px 0;
}
.single-product-slider .carousel .carousel-control i {
  font-size: 40px;
  text-shadow: none;
  color: #555;
}
.single-product-slider .carousel .carousel-indicators li img {
  height: auto;
  width: 60px;
}
.single-product-slider .carousel .carousel-control.right,
.single-product-slider .carousel .carousel-control.left {
  background-image: none;
  top: 40%;
}

.single-product-slider .carousel-indicators {
  margin: 10px 0 0;
  overflow: auto;
  position: static;
  text-align: left;
  white-space: nowrap;
  width: 100%;
  overflow: hidden;
}
.single-product-slider .carousel-indicators li {
  background-color: transparent;
  border-radius: 0;
  display: inline-block;
  height: auto;
  margin: 0 !important;
  width: auto;
}
.single-product-slider .carousel-indicators li.active img {
  opacity: 1;
}
.single-product-slider .carousel-indicators li:hover img {
  opacity: 0.75;
}
.single-product-slider .carousel-indicators li img {
  display: block;
  opacity: 0.5;
}

.single-product-details .color-swatches {
  display: flex;
  align-items: center;
}
.single-product-details .color-swatches span {
  width: 100px;
  color: #000;
  font-size: 13px;
  font-weight: 600;
}
.single-product-details .color-swatches a {
  display: inline-block;
  width: 36px;
  height: 36px;
  margin-right: 5px;
}
.single-product-details .color-swatches li {
  display: inline-block;
}
.single-product-details .color-swatches .swatch-violet {
  background-color: #8da1cd;
}
.single-product-details .color-swatches .swatch-black {
  background-color: #000;
}
.single-product-details .color-swatches .swatch-cream {
  background-color: #e6e2d6;
}
.single-product-details .product-size {
  margin-top: 20px;
  display: flex;
  align-items: center;
}
.single-product-details .product-size span {
  width: 100px;
  color: #000;
  font-size: 13px;
  font-weight: 600;
  display: inline-block;
}
.single-product-details .product-size .form-control {
  display: inline-block;
  width: 130px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #000;
  font-size: 12px;
  border: 1px solid #e5e5e5;
  border-radius: 0px;
  box-shadow: none;
}
.single-product-details .product-category {
  margin-top: 20px;
}
.single-product-details .product-category > span {
  width: 100px;
  color: #000;
  font-size: 13px;
  font-weight: 600;
  display: inline-block;
}
.single-product-details .product-category ul {
  width: 140px;
  display: inline-block;
}
.single-product-details .product-category ul li {
  display: inline-block;
  margin: 5px;
}
.single-product-details .product-quantity {
  margin-top: 20px;
  display: flex;
  align-items: center;
}
.single-product-details .product-quantity > span {
  width: 100px;
  color: #000;
  font-size: 13px;
  font-weight: 600;
  display: inline-block;
}
.single-product-details .product-quantity .product-quantity-slider {
  width: 140px;
  display: inline-block;
}
.single-product-details .product-quantity .product-quantity-slider input {
  height: 34px;
}
.single-product-details .product-quantity .product-quantity-slider .input-group-btn:first-child > .btn,
.single-product-details .product-quantity .product-quantity-slider .p-quantity .input-group-btn:first-child > .btn-group {
  margin-right: -2px;
}
.single-product-details .product-quantity .product-quantity-slider button {
  border-radius: 0;
}

.bootstrap-touchspin .input-group-btn-vertical {
  position: relative;
  white-space: nowrap;
  width: 1%;
  vertical-align: middle;
  display: table-cell;
}

.bootstrap-touchspin .input-group-btn-vertical > .btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%;
  padding: 8px 10px;
  margin-left: -1px;
  position: relative;
}

.bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-up {
  border-radius: 0;
  border-top-right-radius: 4px;
}

.bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-down {
  margin-top: -2px;
  border-radius: 0;
  border-bottom-right-radius: 4px;
}

.bootstrap-touchspin .input-group-btn-vertical i {
  position: absolute;
  top: 3px;
  left: 5px;
  font-size: 9px;
  font-weight: normal;
}

.clients-logo-section {
  padding-top: 30px;
  padding-bottom: 75px;
}
.clients-logo-section .clients-logo-img {
  padding: 0px 50px;
}

.clients-logo img {
  width: auto !important;
  padding: 20px;
}

.about .block h2 {
  padding-top: 35px;
  margin: 0;
}
.about .block p {
  padding-top: 20px;
  line-height: 28px;
}
.about .block img {
  width: 100%;
}
.about .about-img {
  overflow: hidden;
}
.about .about-img:hover img {
  transform: scale3D(1.1, 1.1, 1);
}
.about .about-img img {
  opacity: 0.6;
  transition: all 0.5s ease-out;
}
.about .section-title {
  margin-bottom: 0px;
}

.instagram-feed a {
  margin: 6px;
  margin-right: 10px;
  display: inline-block;
  margin-bottom: 10px;
  width: 23.5%;
}
@media (max-width: 768px) {
  .instagram-feed a {
    width: 49%;
    margin: 3px;
  }
}
@media (max-width: 480px) {
  .instagram-feed a {
    width: 100%;
    margin: 3px;
  }
}
.instagram-feed a:hover img {
  filter: grayscale(10);
}
.instagram-feed a img {
  width: 100%;
}

.dashboard-menu .active {
  background: #655E7A;
  color: #fff;
  border: 1px solid #655E7A;
}
.dashboard-menu li {
  padding: 0;
  margin: 0 3px;
}
.dashboard-menu li a {
  padding: 10px 20px;
  border: 1px solid #dedede;
}
@media (max-width: 768px) {
  .dashboard-menu li a {
    padding: 10px 15px;
  }
}
@media (max-width: 480px) {
  .dashboard-menu li a {
    padding: 10px 5px;
  }
}
@media (max-width: 400px) {
  .dashboard-menu li a {
    padding: 10px 5px;
    font-size: 12px;
  }
}

.dashboard-wrapper {
  border: 1px solid #dedede;
  margin-top: 30px;
  padding: 20px;
}
.dashboard-wrapper h2 {
  font-size: 18px;
}
.dashboard-wrapper h4 {
  font-size: 16px;
}
.dashboard-wrapper .user-img {
  width: 120px;
  border-radius: 100px;
}

.dashboard-user-profile .user-img {
  width: 180px;
}
.dashboard-user-profile .user-profile-list {
  margin-top: 30px;
  padding-left: 30px;
}
.dashboard-user-profile .user-profile-list li {
  margin-bottom: 8px;
}
.dashboard-user-profile .user-profile-list span {
  font-weight: bold;
  margin-right: 5px;
  width: 100px;
  display: inline-block;
}

/*=================================================================
  Single Blog Page
==================================================================*/
.post.post-single {
  border: none;
}
.post.post-single .post-thumb {
  margin-top: 30px;
}

.post-sub-heading {
  border-bottom: 1px solid #dedede;
  padding-bottom: 20px;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-size: 16px;
  margin-bottom: 20px;
}

.post-social-share {
  margin-bottom: 50px;
}

.post-comments {
  margin: 30px 0;
}
.post-comments .media {
  margin-top: 40px;
}
@media (max-width: 480px) {
  .post-comments .media {
    display: block;
  }
}
.post-comments .media > .pull-left {
  padding-right: 20px;
}
@media (max-width: 480px) {
  .post-comments .media > .pull-left {
    display: inline-block;
    margin-bottom: 15px;
  }
}
.post-comments .comment-author {
  margin-top: 0;
  margin-bottom: 0px;
  font-weight: 500;
}
.post-comments .comment-author a {
  color: #655E7A;
  font-size: 14px;
  text-transform: uppercase;
}
.post-comments time {
  margin: 0 0 5px;
  display: inline-block;
  color: #808080;
  font-size: 12px;
}
.post-comments .comment-button {
  color: #655E7A;
  display: inline-block;
  margin-left: 5px;
  font-size: 12px;
}
.post-comments .comment-button i {
  margin-right: 5px;
  display: inline-block;
}
.post-comments .comment-button:hover {
  color: #655E7A;
}

.post-excerpt {
  margin-bottom: 60px;
}
.post-excerpt h3 a {
  color: #000;
}
.post-excerpt p {
  margin: 0 0 30px;
}
.post-excerpt blockquote.quote-post {
  margin: 20px 0;
  margin-bottom: 30px;
}
.post-excerpt blockquote.quote-post p {
  line-height: 30px;
  font-size: 20px;
  color: #655E7A;
  margin-bottom: 0;
}

.single-blog {
  background-color: #fff;
  margin-bottom: 50px;
  padding: 20px;
}

.blog-subtitle {
  font-size: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid #dedede;
  margin-bottom: 25px;
  text-transform: uppercase;
}

.next-prev {
  border-bottom: 1px solid #dedede;
  border-top: 1px solid #dedede;
  margin: 20px 0;
  padding: 25px 0;
}
.next-prev a {
  color: #000;
}
.next-prev a:hover {
  color: #655E7A;
}
.next-prev .prev-post i {
  margin-right: 10px;
}
.next-prev .next-post i {
  margin-left: 10px;
}

.social-profile ul li {
  margin: 0 10px 0 0;
  display: inline-block;
}
.social-profile ul li a {
  color: #4e595f;
  display: block;
  font-size: 16px;
}
.social-profile ul li a i:hover {
  color: #655E7A;
}

.comments-section {
  margin-top: 35px;
}

.author-about {
  margin-top: 40px;
}

.post-author {
  margin-right: 20px;
}

.post-author > img {
  border: 1px solid #dedede;
  max-width: 120px;
  padding: 5px;
  width: 100%;
}

.comment-list ul {
  margin-top: 20px;
}
.comment-list ul li {
  margin-bottom: 20px;
}

.comment-wrap {
  border: 1px solid #dedede;
  border-radius: 1px;
  margin-left: 20px;
  padding: 10px;
  position: relative;
}
.comment-wrap .author-avatar {
  margin-right: 10px;
}
.comment-wrap .media .media-heading {
  font-size: 14px;
  margin-bottom: 8px;
}
.comment-wrap .media .media-heading a {
  color: #655E7A;
  font-size: 13px;
}
.comment-wrap .media .comment-meta {
  font-size: 12px;
  color: #888;
}
.comment-wrap .media p {
  margin-top: 15px;
}

.comment-reply-form {
  margin-top: 80px;
}
.comment-reply-form input,
.comment-reply-form textarea {
  height: 35px;
  border-radius: 0;
  box-shadow: none;
}
.comment-reply-form input:focus,
.comment-reply-form textarea:focus {
  box-shadow: none;
  border: 1px solid #655E7A;
}
.comment-reply-form textarea,
.comment-reply-form .btn-main,
.comment-reply-form .btn-transparent,
.comment-reply-form .btn-small {
  height: auto;
}

.bg-2 {
	<?php $db = connect(); ?>
  background: url(<?php renderContent($db, 2, "img"); ?>);
  background-size: cover;
  background-attachment: fixed;
}

.bg-1 {
	<?php $db = connect(); ?>
  background-image: url(<?php renderContent($db, 8, "img"); ?>);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.widget {
  margin-bottom: 30px;
}
.widget .widget-title {
  margin-bottom: 15px;
  padding-bottom: 10px;
  font-size: 16px;
  color: #333;
  font-weight: 500;
  border-bottom: 1px solid #dedede;
}
.widget.widget-latest-post .media {
  margin-bottom: 10px;
}
.widget.widget-latest-post .media .media-object {
  width: 90px;
  height: auto;
  margin-right: 15px;
}
.widget.widget-latest-post .media .media-heading {
  margin-bottom: 0;
}
.widget.widget-latest-post .media .media-heading a {
  color: #000;
  font-size: 16px;
  transition: 0.3s;
}
.widget.widget-latest-post .media .media-heading a:hover {
  color: #655E7A;
}
.widget.widget-latest-post .media p {
  font-size: 12px;
  color: #808080;
}
.widget.widget-category ul li a {
  color: #837f7e;
  transition: all 0.3s ease;
  border: 1px solid #eee;
  display: block;
  padding: 8px 15px;
  margin-bottom: -1px;
}
.widget.widget-category ul li a:before {
  padding-right: 10px;
}
.widget.widget-category ul li a:hover {
  color: #655E7A;
  padding-left: 20px;
}
.widget.widget-tag ul li {
  margin-bottom: 10px;
  display: inline-block;
  margin-right: 5px;
}
.widget.widget-tag ul li a {
  color: #837f7e;
  display: inline-block;
  padding: 8px 15px;
  border: 1px solid #dedede;
  border-radius: 30px;
  font-size: 14px;
  transition: all 0.3s ease;
}
.widget.widget-tag ul li a:hover {
  color: #fff;
  background: #655E7A;
  border: 1px solid #655E7A;
}

/*=================================================================
  Latest Posts
==================================================================*/
.blog {
  background: #F6F6F6;
}

.post {
  background: #fff;
  margin-bottom: 40px;
  padding-bottom: 20px;
}
.post .post-media.post-thumb img {
  width: 100%;
  height: auto;
}
.post .post-media.post-media-audio iframe {
  width: 100%;
}
.post .post-title {
  margin-top: 10px;
  margin: 25px 0 0;
  text-transform: capitalize;
  font-size: 26px;
  margin-bottom: 20px;
}
.post .post-title a {
  color: #655E7A;
}
.post .post-title a:hover {
  color: #655E7A;
}
.post .post-meta {
  font-size: 13px;
  margin-top: 10px;
  text-transform: uppercase;
}
.post .post-meta ul li {
  display: inline-block;
  color: #909090;
  margin-right: 20px;
  font-size: 12px;
  letter-spacing: 0.5px;
}
.post .post-meta ul li a {
  color: #909090;
}
.post .post-meta ul li a:hover {
  color: #655E7A;
}
.post .post-meta .post-author {
  color: #000;
}
.post .post-content {
  margin-top: 20px;
}
.post .post-content p {
  line-height: 26px;
}
.post .post-content .btn-main, .post .post-content .btn-transparent, .post .post-content .btn-small {
  padding: 10px 20px;
  margin: 15px 0;
  font-size: 12px;
}

.post-pagination {
  margin-top: 40px;
}
@media (max-width: 480px) {
  .post-pagination {
    display: block;
  }
}
.post-pagination > li {
  margin: 5px;
  display: inline-block;
  font-size: 14px;
}
.post-pagination > li > a {
  color: #000;
  padding: 10px 15px;
  border-radius: 0 !important;
  transition: all 0.3s ease;
}
.post-pagination > li > a:hover {
  color: #fff;
  background: #655E7A;
  border: 1px solid #655E7A;
}
.post-pagination > li.active > a {
  background: #655E7A !important;
  border: 1px solid #655E7A !important;
}
.post-pagination > li:first-child > a,
.post-pagination > li:last-child > a {
  border-radius: 0;
}

.page-link:focus {
  box-shadow: none;
}


@media (max-width: 400px) {
  .coming-soon {
    padding: 50px 0;
  }
}
@media (max-width: 480px) {
  .coming-soon {
    padding: 50px 0;
  }
}
.coming-soon .block h1 {
  line-height: 65px;
  font-size: 55px;
  font-weight: 600;
  text-transform: uppercase;
  margin-bottom: 0;
}
@media (max-width: 400px) {
  .coming-soon .block h1 {
    font-size: 40px;
    line-height: 50px;
  }
}
@media (max-width: 480px) {
  .coming-soon .block h1 {
    font-size: 40px;
    line-height: 50px;
  }
}
.coming-soon .block p {
  color: #fff;
  margin-top: 10px;
  font-size: 14px;
}
.coming-soon .block .count-down {
  margin-top: 50px;
}
.coming-soon .block .count-down .syotimer-cell {
  width: 25%;
  padding: 15px;
  display: inline-block;
  background: rgba(101, 94, 122, 0.48);
}
@media (max-width: 400px) {
  .coming-soon .block .count-down .syotimer-cell {
    width: 50%;
    margin-bottom: 10px;
  }
}
@media (max-width: 480px) {
  .coming-soon .block .count-down .syotimer-cell {
    width: 50%;
  }
}
.coming-soon .block .count-down .syotimer-cell .syotimer-cell__value {
  font-size: 80px;
  line-height: 80px;
  text-align: center;
  position: relative;
  font-weight: bold;
}
@media (max-width: 400px) {
  .coming-soon .block .count-down .syotimer-cell .syotimer-cell__value {
    font-size: 50px;
  }
}
.coming-soon .block .count-down .syotimer-cell .syotimer-cell__unit {
  font-weight: normal;
}
@media (max-width: 768px) {
  .coming-soon .block .count-down ul li {
    font-size: 50px;
  }
}
@media (max-width: 480px) {
  .coming-soon .block .count-down ul li {
    font-size: 50px;
  }
}
@media (max-width: 400px) {
  .coming-soon .block .count-down ul li {
    font-size: 40px;
  }
}
.coming-soon .block .count-down ul li:before {
  content: ":";
  font-size: 20pt;
  opacity: 0.7;
  position: absolute;
  right: 0px;
  top: 0px;
}
.coming-soon .block .count-down ul li:last-child:before {
  content: "";
}
.coming-soon .block .count-down div:after {
  content: " " attr(data-interval-text);
  font-size: 20px;
  font-weight: normal;
  text-transform: capitalize;
  display: block;
}
.coming-soon .block .copyright-text {
  font-size: 12px;
}
.coming-soon .block .copyright-text a {
  color: #fff;
  font-weight: 600;
}

.shopping .widget-title {
  font-weight: 400;
  border-bottom: 1px solid #dedede;
  padding-bottom: 15px;
  margin-bottom: 15px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-size: 16px;
}

.checkout .block {
  padding: 15px;
  margin-bottom: 10px;
}

.checkout-form .form-group {
  position: relative;
  margin-bottom: 8px;
}
.checkout-form .form-group label {
  position: absolute;
  top: 18px;
  left: 15px;
  right: auto;
  bottom: auto;
  color: #888;
  font-size: 10px;
  font-weight: 400;
  text-transform: uppercase;
  opacity: 1 !important;
  width: 85px;
}
.checkout-form .form-group input {
  border-radius: 0;
  display: block;
  padding: 6px 10px 5px 100px;
  -moz-appearance: none;
  -webkit-appearance: none;
  height: 50px;
}
.checkout-form .checkout-country-code .form-group {
  float: left;
}
.checkout-form .checkout-country-code .form-group:first-child {
  width: calc(45% - 2px);
  margin-right: 4px;
}
.checkout-form .checkout-country-code .form-group:last-child {
  width: calc(55% - 2px);
}

.shopping.cart .product-list .table .cart-amount th {
  background: #f9f9f9;
  padding: 10px;
  text-transform: uppercase;
}
.shopping.cart .product-list .table > tbody > tr > td {
  vertical-align: middle;
}
.shopping.cart .product-list .product-info a {
  margin-left: 10px;
  color: #000;
  font-weight: 600;
}
.shopping.cart .product-list .product-remove {
  color: #c7254e;
}
.shopping.cart .account-details {
  margin-top: 30px;
}
.shopping.cart .account-details legend {
  font-weight: 600;
  font-size: 16px;
  text-transform: uppercase;
}
.shopping.cart .account-details .btn-pay {
  margin: 20px 0;
}

.product-checkout-details .product-card > a {
  padding-right: 20px;
}
.product-checkout-details .product-card .price {
  margin-top: 15px;
}
.product-checkout-details .product-card .media-object {
  width: 80px;
}
.product-checkout-details .product-card h4 {
  font-weight: 400;
  font-size: 14px;
  color: #555;
}
.product-checkout-details .product-card .remove {
  font-size: 12px;
  cursor: pointer;
}
.product-checkout-details .discount-code {
  border-top: 1px solid #dedede;
  border-bottom: 1px solid #dedede;
  margin: 20px 0 10px;
  padding: 10px 0;
}
.product-checkout-details .discount-code p {
  margin: 0;
}
.product-checkout-details .discount-code p a {
  font-weight: 400;
  color: #555;
}
.product-checkout-details .summary-prices {
  border-style: solid;
  border-color: #dedede;
  border-width: 0px 0 1px 0;
  padding-bottom: 10px;
}
.product-checkout-details .summary-prices li {
  padding: 5px 0;
}
.product-checkout-details .summary-prices li span + span {
  float: right;
}
.product-checkout-details .summary-total {
  margin-top: 5px;
}
.product-checkout-details .summary-total > span {
  font-weight: 500;
  font-size: 18px;
}
.product-checkout-details .summary-total span + span {
  float: right;
}
.product-checkout-details .verified-icon {
  margin-top: 25px;
}
.product-checkout-details .verified-icon img {
  width: 100%;
}

.purchase-confirmation .purchase-confirmation-details {
  padding: 20px;
  border: 1px solid #dedede;
}
.purchase-confirmation .purchase-confirmation-details .table {
  margin: 0;
  color: #444;
}
.purchase-confirmation .purchase-confirmation-details .table b,
.purchase-confirmation .purchase-confirmation-details .table strong {
  font-weight: 400;
}

.empty-cart .block i {
  font-size: 50px;
}

.success-msg .block i {
  font-size: 40px;
  background: #1bbb1b;
  color: #fff;
  width: 60px;
  height: 60px;
  border-radius: 100px;
  display: inline-block;
  line-height: 60px;
}

.page-404 {
  display: flex;
  align-items: center;
  min-height: 100vh;
  padding: 70px 0;
  text-align: center;
}
.page-404 h1 {
  font-size: 250px;
  font-weight: bold;
  line-height: 1;
  margin-top: 30px;
}
@media (max-width: 480px) {
  .page-404 h1 {
    font-size: 130px;
    line-height: 150px;
  }
}
@media (max-width: 400px) {
  .page-404 h1 {
    font-size: 100px;
    line-height: 100px;
  }
}
@media (max-width: 768px) {
  .page-404 h1 {
    font-size: 150px;
    line-height: 200px;
  }
}
.page-404 h2 {
  text-transform: uppercase;
  font-size: 20px;
  letter-spacing: 4px;
  font-weight: bold;
  margin-top: 30px;
}
.page-404 .copyright-text {
  margin-top: 50px;
  font-size: 12px;
}
.page-404 .copyright-text a {
  font-weight: 600;
}
.page-404 .btn-main, .page-404 .btn-transparent, .page-404 .btn-small {
  margin-top: 40px;
}

.footer {
  background: #F5F5F5;
  text-align: center;
  padding: 80px 0;
}
.footer p {
  font-size: 13px;
  line-height: 25px;
  color: #919191;
}
.footer a {
  color: #595959;
}
.footer .footer-manu {
  padding-bottom: 25px;
}
.footer .footer-manu ul {
  margin: 0px;
  padding: 0px;
}
.footer .footer-manu ul li {
  display: inline-block;
  padding: 10px 20px;
}
.footer .footer-manu ul li a {
  display: inline-block;
  color: #494949;
}
.footer .footer-manu ul li a:hover {
  color: #000;
}
.footer .copyright a {
  font-weight: 600;
}

.scroll-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  z-index: 999;
  height: 40px;
  width: 40px;
  background: #655E7A;
  border-radius: 50%;
  text-align: center;
  line-height: 40px;
  color: white;
  cursor: pointer;
  transition: 0.3s;
  display: none;
}
@media (max-width: 480px) {
  .scroll-to-top {
    bottom: 15px;
    right: 15px;
  }
}
.scroll-to-top:hover {
  background-color: #333;
}

textarea {
	white-space: pre-wrap;
	background-color: #f8f8f8;
	max-width: 100%;
	min-width: 50%;
}

.editable-text {
	white-space: pre-wrap;
}