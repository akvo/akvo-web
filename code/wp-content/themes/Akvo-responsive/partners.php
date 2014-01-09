<?php
	/*
		Template Name: partnerPage
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Partner Page-->

<div id="content" class="floats-in partnerPage withSubMenu">
  <h1 class="backLined">Our partners</h1>
  <div class="wrapper">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="centerED fullWidthParag"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>

  </div>
  <nav class="anchorNav wrapper">
    <h5>menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#govGroup" class="pStaff">Governments</a></li>
      <li><a href="#compsGroup" class="cStaff">Companies</a></li>
      <li><a href="#founGroup" class="eStaff">Foundations</a></li>
      <li><a href="#intGovGroup" class="eStaff">Inter-governmental</a></li>
      <li><a href="#ngoGroup" class="eStaff">NGOs</a></li>
      <li><a href="#knowledgeGroup" class="eStaff">Knowledge institutes</a></li>
    </ul>
  </nav>
  <section class="wrapper">
    <div id="govGroup">
      <h2 class="pStaffHead">Governments</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset government" id="dutchMinistry">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/DGIS.png" title="Dutch Ministry of Foreign Affairs (DGIS)" alt="Dutch Ministry of Foreign Affairs (DGIS)" /></div>
          <div class="staffName"><a href="#">Dutch Ministry of Foreign Affairs (DGIS)</a></div>
          <p class="staffTitle">It's time for open data</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset government" id="liberiaGov">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/washLiberia.png" title="Government of Liberia" alt="Government of Liberia" /></div>
          <div class="staffName"><a href="#">Government of Liberia</a></div>
          <p class="staffTitle">Mapping and monitoring the country's water supply</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset government" id="partnerWater">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/pvw.png" title="Partners for Water" alt="Partners for Water" /></div>
          <div class="staffName"><a href="#">Partners for Water</a></div>
          <p class="staffTitle">Tackling Millennium Development goals</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset government" id="uSaid">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/usaid.png" title="USAID" alt="USAID" /></div>
          <div class="staffName"><a href="#">USAID</a></div>
          <p class="staffTitle">Making aid more transparent</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="compsGroup">
      <h2 class="cStaffHead">Companies</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset company" id="cardNo">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/cardno.png" title="Cardno" alt="Cardno" /></div>
          <div class="staffName"><a href="#">Cardno</a></div>
          <p class="staffTitle">Output-based aid</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="ciscoInc">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/cisco.png" title="Cisco Inc" alt="Cisco Inc" /></div>
          <div class="staffName"><a href="#">Cisco Inc</a></div>
          <p class="staffTitle">Investing in Akvo FLOW</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="earthWater">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/earth.png" title="Earth Water" alt="Earth Water" /></div>
          <div class="staffName"><a href="#">Earth Water</a></div>
          <p class="staffTitle">Food and drink</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="knvb">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/knvb.png" title="KNVB " alt="KNVB " /> </div>
          <div class="staffName"><a href="#">KNVB</a></div>
          <p class="staffTitle">Sport</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="marsChoco">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/mars.png" title="Mars Chocolates " alt="Mars Chocolates " /> </div>
          <div class="staffName"><a href="#">Mars Chocolates</a></div>
          <p class="staffTitle">Sustainable cocoa</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="parade">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/parade.png" title="Parade  " alt="Parade  " /> </div>
          <div class="staffName"><a href="#">Parade</a></div>
          <p class="staffTitle">Theatre</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="philips">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/phillips.png" title="Philips  " alt="Philips  " /> </div>
          <div class="staffName"><a href="#">Phillips</a></div>
          <p class="staffTitle">Lighting</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset company" id="raboBank">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/rabobank.png" title="Rabobank" alt="Rabobank" /> </div>
          <div class="staffName"><a href="#">Rabobank</a></div>
          <p class="staffTitle">Finance</p>
          <small>Click for more details.</small></li>
        
        <!--       <li class="partnerAsset company" id="tataFoundation">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/tata.png" title="Tata Foundation " alt="Tata Foundation " /> </div>
          <div class="staffName"><a href="#">Tata Foundation</a></div>
          <p class="staffTitle">Need a tag line</p>
          <small>Click for more details.</small></li>
-->
        <li class="partnerAsset company" id="vitens">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/vitens.png" title="Vitens " alt="Vitens " /> </div>
          <div class="staffName"><a href="#">Vitens</a></div>
          <p class="staffTitle">Drinking water projects in African schools</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="founGroup">
      <h2 class="eStaffHead">Foundations</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset foundations" id="gatesFound">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/gates.png" title="Bill & Melinda Gates Foundation" alt="Bill & Melinda Gates Foundation" /></div>
          <div class="staffName"><a href="#">Bill & Melinda Gates Foundation</a></div>
          <p class="staffTitle">Showing the world aid is working</p>
          <small>Click for more details.</small></li>
<!--        <li class="partnerAsset foundations" id="harderFoundation ">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/harder.png" title="Harder Foundation " alt="Harder Foundation" /></div>
          <div class="staffName"><a href="#">Harder Foundation </a></div>
          <p class="staffTitle">Investing in Akvo FLOW</p>
          <small>Click for more details.</small></li>
-->        <li class="partnerAsset foundations" id="hiltonFoundation ">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/hilton.png" title="Hilton Foundation" alt="Hilton Foundation" /></div>
          <div class="staffName"><a href="#">Hilton Foundation</a></div>
          <p class="staffTitle">Investing in Akvo FLOW</p>
          <small>Click for more details.</small></li>
          
        <li class="partnerAsset foundations" id="kenneth">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/kenneth.png" title="Kenneth L. Harder Trust " alt="Kenneth L. Harder Trust " /></div>
          <div class="staffName"><a href="#">Kenneth L. Harder Trust </a></div>
          <p class="staffTitle">Investing in Akvo FLOW</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="intGovGroup">
      <h2 class="eStaffHead">Inter-governmental</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset interGov" id="amref">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/amref.png" title="Amref" alt="Amref" /></div>
          <div class="staffName"><a href="#">Amref</a></div>
          <p class="staffTitle">Water and health</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset interGov" id="undp">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/undp.png" title="UNDP" alt="UNDP" /></div>
          <div class="staffName"><a href="#">UNDP</a></div>
          <p class="staffTitle">Central and Eastern European development programmes</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset interGov" id="unicef">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/unicef.png" title="Unicef" alt="Unicef" /></div>
          <div class="staffName"><a href="#">UNICEF</a></div>
          <p class="staffTitle">Introducing Akvo FLOW in West Africa</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset interGov" id="unHabitat">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/unHabitat.png" title="UN-Habitat" alt="UN-Habitat" /></div>
          <div class="staffName"><a href="#">UN-Habitat</a></div>
          <p class="staffTitle">Open data portal</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset interGov" id="worldBank">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/worldBank.png" title="World Bank" alt="World Bank" /></div>
          <div class="staffName"><a href="#">World Bank</a></div>
          <p class="staffTitle">Transparency, open data, knowledge sharing</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="ngoGroup">
      <h2 class="eStaffHead">NGOs</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset nGos" id="aquaForAll">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/aqua4.png" title="Aqua for All" alt="Aqua for All" /></div>
          <div class="staffName"><a href="#">Aqua for All</a></div>
          <p class="staffTitle">Water and sanitation</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="connect4Change">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/connect4.png" title="Connect4Change" alt="Connect4Change" /></div>
          <div class="staffName"><a href="#">Connect4Change</a></div>
          <p class="staffTitle">Technology, health, education, and economic development</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="cordAid">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/cordaid.png" title="Cordaid" alt="Cordaid" /></div>
          <div class="staffName"><a href="#">Cordaid</a></div>
          <p class="staffTitle">Health</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="dutchWashAlliance">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/washAlliance.png" title="Dutch WASH Alliance" alt="Dutch WASH Alliance" /></div>
          <div class="staffName"><a href="#">Dutch WASH Alliance</a></div>
          <p class="staffTitle">Water and sanitation</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="footballForWater">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/footballForWater.png" title="Football for Water" alt="Football for Water" /></div>
          <div class="staffName"><a href="#">Football for Water</a></div>
          <p class="staffTitle">Sport and development</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="icco">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/icco.png" title="ICCO" alt="ICCO" /></div>
          <div class="staffName"><a href="#">ICCO</a></div>
          <p class="staffTitle">Showing aid programmes online</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="iicd">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/iicd.png" title="IICD" alt="IICD" /></div>
          <div class="staffName"><a href="#">IICD</a></div>
          <p class="staffTitle">ICT for development</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="millenniumWaterAlliance">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/millenium.png" title="Millennium Water Alliance" alt="Millennium Water Alliance" /></div>
          <div class="staffName"><a href="#">Millennium Water Alliance</a></div>
          <p class="staffTitle">Bringing water and sanitation to millions</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="netherlandsWaterPartnership">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/nwp.png" title="Netherlands Water Partnership" alt="Netherlands Water Partnership" /></div>
          <div class="staffName"><a href="#">Netherlands Water Partnership</a></div>
          <p class="staffTitle">Building partnerships and networks</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="openForChange">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/openChange.png" title="Open for Change" alt="Open for Change" /></div>
          <div class="staffName"><a href="#">Open for Change</a></div>
          <p class="staffTitle">Promoting open data</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="rain">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/rain.png" title="RAIN" alt="RAIN" /></div>
          <div class="staffName"><a href="#">RAIN</a></div>
          <p class="staffTitle">Rainwater harvesting</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="simavi">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/simavi.png" title="Simavi" alt="Simavi" /></div>
          <div class="staffName"><a href="#">Simavi</a></div>
          <p class="staffTitle">Making aid visible online</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="textToChange">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/textToChange.png" title="Text to Change " alt="Text to Change " /></div>
          <div class="staffName"><a href="#">Text to Change</a></div>
          <p class="staffTitle">SMS and mobile services for the poor</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="waterForPeople">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/water4.png" title="Water For People" alt="Water For People" /></div>
          <div class="staffName"><a href="#">Water For People</a></div>
          <p class="staffTitle">Instigator of FLOW</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset nGos" id="onePercent">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/onePercent.png" title="1%CLUB" alt="1%CLUB" /></div>
          <div class="staffName"><a href="#">1%CLUB</a></div>
          <p class="staffTitle">Mobilising people for positive change</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
    <hr class="delicate" />
    <div id="knowledgeGroup">
      <h2 class="eStaffHead">Knowledge Institutes</h2>
      <ul class="staff floats-in">
        <li class="partnerAsset knowledge" id="eawag">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/eawag.png" title="Eawag " alt="Eawag " /></div>
          <div class="staffName"><a href="#">Eawag </a></div>
          <p class="staffTitle">Research partner</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset knowledge" id="irc">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/irc.png" title="IRC " alt="IRC " /></div>
          <div class="staffName"><a href="#">IRC</a></div>
          <p class="staffTitle">Monitoring water and sanitation programmes in Africa</p>
          <small>Click for more details.</small></li>
        <li class="partnerAsset knowledge" id="unescoIHE">
          <div class="imgWrapper"><img src="<?php bloginfo('template_directory'); ?>/images/partners/unescoIHE.png" title="Unesco-IHE " alt="Unesco-IHE " /></div>
          <div class="staffName"><a href="#">Unesco-IHE </a></div>
          <p class="staffTitle">Connecting academics to real projects</p>
          <small>Click for more details.</small></li>
      </ul>
    </div>
  </section>
  <div id="overlay">
    <div id="blanket"></div>
  </div>
  <!-- the dialog contents -->
  <div id="descrDialog" class="dialog">
    <div id="partnerDescr">
      <p>&nbsp;</p>
    </div>
    <div class="buttons"><a class="cancel">close</a></div>
  </div>
</div>
<!-- /#content --> 

<br style="clear:both;">
<!-- end content -->
<?php get_footer(); ?>
