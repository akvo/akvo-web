<?php
/*
	Template Name: teamPage
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Team Page-->

<div id="content" class="floats-in teamPage">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <!--					
					<header>
						<h1 class="backLined"><?php /*?><?php the_title(); ?><?php */?></h1>
					</header>

-->
  
  <h1 class="backLined">Meet our team</h1>
  <p>Akvo stands out because of its people – the quality of the team is outstanding. We take great pride in our people, who are our most valued asset.
    Wanting to work with us? Check out our <a href="#">Jobs page</a>.</p>
  <nav class="anchorNav">
  <ul>
      <li><a href="#partnershipGroup" class="pStaff">partnership</a></li>
      <li><a href="#communicationGroup" class="cStaff">communication &amp; PR</a></li>
      <li><a href="#engineeringGroup" class="eStaff">engineering</a></li>
    </ul>
  </nav>
  <section class="wrapper">
    <div id="managementGroup"><b>Key management</b> is marked by a star icon: <img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/mStaffSmall.png" /></div>
    <div id="partnershipGroup">
      <h2 class="pStaffHead">Partnership</h2>
      <ul class="staff floats-in">
        <li class="staffAsset management partnership" id="peter">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/peter_240.jpg" title="Peter Van Der Linde" alt="Peter Van Der Linde - Co-founder And Co-director" /></div>
          <div class="staffName"><a href="#">Peter Van Der Linde</a></div>
          <p class="staffTitle">Co-founder And Co-director</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership management" id="kathelyne">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/kathelyne240x135.png" title="Kathelyne van den Berg" alt="Kathelyne van den Berg, manager, partner operations" /></div>
          <div class="staffName"><a href="#">Kathelyne van den Berg</a></div>
          <p class="staffTitle">Manager, partner operations</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="luuk">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Luukv2.jpg" title="Luuk Diphoorn" alt="Luuk Diphoorn, manager, East Africa hub " /></div>
          <div class="staffName"><a href="#">Luuk Diphoorn</a></div>
          <p class="staffTitle">Manager, East Africa hub</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="markW">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/mtw1.jpg" title="Mark Tiele Westra" alt="Mark Tiele Westra, Akvopedia editor and programme manager " /></div>
          <div class="staffName"><a href="#">Mark Tiele Westra</a></div>
          <p class="staffTitle">Akvopedia editor and programme manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="jeroen">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/jeroen_240.jpg" title=" Jeroen van der Sommen" alt="Jeroen van der Sommen, co-founder " /></div>
          <div class="staffName"><a href="#">Jeroen van der Sommen</a></div>
          <p class="staffTitle">Co-founder</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="frodo">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/frodoprofilepicx240.jpg" title="Frodo van Oostveen" alt="Frodo van Oostveen, programme manager" /></div>
          <div class="staffName"><a href="#">Frodo van Oostveen</a></div>
          <p class="staffTitle">Programme manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="amit">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/amit240.jpg" title="Amitangshu Acharya" alt="Amitangshu Acharya, consultant, Asian programmes" /></div>
          <div class="staffName"><a href="#">Amitangshu Acharya</a></div>
          <p class="staffTitle">Consultant, Asian programmes</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="hans">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/hans240.jpg" title="Hans Merton" alt="Hans Merton, project manager " /></div>
          <div class="staffName"><a href="#">Hans Merton</a></div>
          <p class="staffTitle">Project manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="phylis">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/phylis2_240b.jpg" title="Phylis Gichuru Webi" alt="Phylis Gichuru Webi, partnerships assistant, East Africa hub " /></div>
          <div class="staffName"><a href="#">Phylis Gichuru Webi</a></div>
          <p class="staffTitle">Partnerships assistant, East Africa hub</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="laura">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/laura240.jpg" title=" Laura Roverts" alt=" Laura Roverts, project officer " /></div>
          <div class="staffName"><a href="#"> Laura Roverts</a></div>
          <p class="staffTitle">Project officer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="lissy">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/lissy240.jpg" title="Lissy van Noort" alt="Lissy van Noort, project officer" /></div>
          <div class="staffName"><a href="#">Lissy van Noort</a></div>
          <p class="staffTitle">Project officer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="francis">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/francis240.png" title="Francis Warui" alt="Francis Warui, partnership assistant, East Africa hub" /></div>
          <div class="staffName"><a href="#">Francis Warui</a></div>
          <p class="staffTitle">Partnership assistant, East Africa hub</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="henry">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/henry240.jpg" title="Henry Jewell" alt=" Henry Jewell, programme manager, Akvo FLOW" /></div>
          <div class="staffName"><a href="#"> Henry Jewell</a></div>
          <p class="staffTitle">Programme manager, Akvo FLOW</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="joyce">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/joyce240.jpg" title="Joyce Kent" alt="Joyce Kent, office manager " /></div>
          <div class="staffName"><a href="#">Joyce Kent</a></div>
          <p class="staffTitle">Office manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="josje">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/josje240.jpg" title="Josje Spierings" alt="Josje Spierings, project coordinator" /></div>
          <div class="staffName"><a href="#">Josje Spierings</a></div>
          <p class="staffTitle">Project coordinator</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="annaM">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Annamarthe240.jpg" title="Anna-Marthe Sessink" alt=" Anna-Marthe Sessink, project coordinator" /></div>
          <div class="staffName"><a href="#"> Anna-Marthe Sessink</a></div>
          <p class="staffTitle">Project coordinator</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset partnership" id="charlotte">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/charlotte240.png" title="Charlotte Soedjak" alt="Charlotte Soedjak, project officer" /></div>
          <div class="staffName"><a href="#">Charlotte Soedjak</a></div>
          <p class="staffTitle">Project officer</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="communicationGroup">
      <h2 class="cStaffHead">Communication and PR</h2>
      <ul class="staff floats-in">
        <li class="staffAsset management communication" id="markC">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/charmerx2240.jpg" title="Mark Charmer" alt="Mark Charmer, co-founder and communications director" /></div>
          <div class="staffName"><a href="#">Mark Charmer</a></div>
          <p class="staffTitle">Co-founder and communications director</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset communication" id="jo">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/jocrop240.png" title="Jo Pratt" alt=" Jo Pratt, communications manager " /></div>
          <div class="staffName"><a href="#">Jo Pratt</a></div>
          <p class="staffTitle">Communications manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset communication" id="emily">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Emily240.jpg" title="Emily Armanetti" alt="Emily Armanetti, communications manager" /></div>
          <div class="staffName"><a href="#"> Emily Armanetti</a></div>
          <p class="staffTitle">Communications manager</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset communication" id="linda">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Linda240.jpg" title="Linda Leunissen, illustrator and graphic designer" alt="Linda Leunissen, illustrator and graphic designer" /></div>
          <div class="staffName"><a href="#">Linda Leunissen</a></div>
          <p class="staffTitle">Illustrator and graphic designer</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="engineeringGroup">
      <h2 class="eStaffHead">Design and Engineering</h2>
      <ul class="staff floats-in">
        <li class="staffAsset management engineering" id="thomas">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/thomas_240.jpg" title="Thomas Bjelkeman-Pettersson" alt="Thomas Bjelkeman-Pettersson: co-founder and co-director" /></div>
          <div class="staffName"><a href="#">Thomas Bjelkeman-Pettersson</a></div>
          <p class="staffTitle">Co-founder and co-director</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="paul">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Paul240.jpg" title="Paul Burt: web programmer" alt="Paul Burt: web programmer" /></div>
          <div class="staffName"><a href="#">Paul Burt</a></div>
          <p class="staffTitle">Web programmer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="oli">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/oligl.png" title="Oliver Galloway-Lunn" alt="Oliver Galloway-Lunn, Developer" /></div>
          <div class="staffName"><a href="#">Oliver Galloway-Lunn</a></div>
          <p class="staffTitle">Developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="loic">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/loic240.jpg" title="Loïc Sans" alt="Loïc Sans, designer and front-end developer" /></div>
          <div class="staffName"><a href="#">Loïc Sans</a></div>
          <p class="staffTitle">Designer and front-end developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="gabriel">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/gabriel_240.jpg" title="Gabriel von Heijne" alt="Gabriel von Heijne, co-founder and developer" /></div>
          <div class="staffName"><a href="#">Gabriel von Heijne</a></div>
          <p class="staffTitle">Co-founder and developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="daniel">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/daniel240v2.png" title="Daniel Karlsson" alt="Daniel Karlsson, web developer" /></div>
          <div class="staffName"><a href="#">Daniel Karlsson</a></div>
          <p class="staffTitle">Web Developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="adrian">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/adrian240b.jpg" title="Adrian Collier" alt="Adrian Collier, product manager, Akvo RSR" /></div>
          <div class="staffName"><a href="#">Adrian Collier</a></div>
          <p class="staffTitle">Product manager, Akvo RSR</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="caetie">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/Caetie240.jpg" title="Caetie Ofiesh" alt="Caetie Ofiesh, product manager, Akvo FLOW" /></div>
          <div class="staffName"><a href="#">Caetie Ofiesh</a></div>
          <p class="staffTitle">Product manager, Akvo FLOW</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="stellan">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/stellan240.jpg" title="Stellan Lagerström" alt="Stellan Lagerström, developer" /></div>
          <div class="staffName"><a href="#">Stellan Lagerström</a></div>
          <p class="staffTitle">Developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="ivan">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/ivan.png" title="Iván Perdomo" alt="Iván Perdomo, developer" /></div>
          <div class="staffName"><a href="#">Iván Perdomo</a></div>
          <p class="staffTitle">Developer</p>
          <small>Click for more details.</small></li>
        <li class="staffAsset engineering" id="lynn">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/lynn240.png" title="Lynn Greenwood" alt="Lynn Greenwood, internal IT manager and assistant to Thomas" /></div>
          <div class="staffName"><a href="#">Lynn Greenwood</a></div>
          <p class="staffTitle">Internal IT manager and assistant to Thomas</p>
          <small>Click for more details.</small></li>
      </ul>
      <ul class="staff floats-in">
        <li class="newStaff">
          <div class="imgWrapper"><img src="http://akvo.org/wp-content/themes/Akvo-responsive//images/staff/you.png" title="Tell us more about you" alt="Tell us more about you" /></div>
          <div class="staffName"><a href="#">You?</a></div>
          <p class="staffTitle">Check Out The Available Jobs.</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
  </section>
  <div id="overlay">
    <div id="blanket"></div>
  </div>
  <!-- the dialog contents -->
  <div id="descrDialog" class="dialog">
    <div id="staffDescr">
      <p>&nbsp;</p>
    </div>
    <div class="buttons"><a class="cancel">close</a></div>
  </div>
  <?php endwhile; // end of the loop. ?>
</div>
<!-- /#content --> 

<br style="clear:both;">
<!-- end content -->
<?php get_footer(); ?>
