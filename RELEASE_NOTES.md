












--------
Akvo.org ver 1.1.10 Kinetic kiwi
---

Tuesday 27 January 2015, @lynngre


## New & noteworthy

Because Akvo works with the IATI standard, we can help you share your work via IATI and at the same time get much more out of your programme reporting, monitoring and evaluation.  Discover our new [Akvo IATI page]( http://akvo.org/products/akvo-iati/) for further details.

We have also updated our [Akvo RSR](http://akvo.org/products/rsr/) and [Akvo FLOW](http://akvo.org/products/akvoflow/) product pages to include some examples of how Akvo products can assist you - from collecting data to decision making based on that data.

There are also two new focus area widgets added to the sidebar of the blog.  Right now you can watch a news clip of [Akvo's work with UNICEF Pacific](http://akvo.org/blog/) in Fiji.


## New features


### Akvo/IATI page

New page linking from the Akvo RSR product page highlighting IATI and Akvo's products integrate into the framework.

http://akvo.org/products/akvo-iati/


Github issue: #494 


### Widgets for the Blog page sidebar

Two new widgets added to allow for addition of the newsletter signup and any other focus area.

http://akvo.org/blog/


Github issue:  #495 


## Bug fixes & changes


### Page edits

Small edits to various pages to correct issues such as line breaks and grammar in page headings.

Github issue:  #483 & #477 

###  RSR Product page & FLOW Product page - Who is using?

The 'Who is using?' area on both the Akvo RSR and Akvo FLOW product pages have been updated with various case studies of how are where the tools are used from the collection of data through to the decision making based on that data.

http://akvo.org/products/rsr/
http://akvo.org/products/akvoflow/

--------
Akvo.org ver 1.1.10 Kinetic kiwi
---

Wednesday 3 December 2014, @lynngre


## New & noteworthy

The boxes in the 'Currently happening' area of the homepage, currently displaying Akvo.tv & the Akvo Newsletter, are now widgetized.  This allows swopping out of these boxes to allow a new focus area - such as the upcoming RSR v3 release or the FLOW monitoring feature.

## New features


### Homepage 'currently happening' boxes

Two of the four boxes have been updated to allow for swopping out of the current Akvo.tv & Newsletter features.

Github issue: #441 


## Bug fixes & changes


### Working at Akvo

This page has been made customisable for the Communications team.

http://akvo.org/about-us/working-at-akvo/


Github issue:  #463 & #462  

###  Smaller improvements

Images could not be loaded into the WP media library when over 2MB, although the limit was set to 64MB, this was fixed on the server side.

Github issue:  #461 

RSR Up menu item has been removed & a link to the RSR Up page now resides on the RSR Product page.

http://akvo.org/products/rsr/

#437  

---
Akvo.org ver 1.1.9 Jumping Jackfruit
---

Tuesday 11 October 2014, @lynngre


## New & noteworthy


Akvo Sites now has it’s own product page!  Follow the link to find out how Akvo can help you bring your story together http://www.akvo.org/products/akvo-sites/ 

Our Akvo RSR and Akvo FLOW product pages now link through to proof that we dogfood!  By visiting the ‘Who is using’ area you can click through to Akvo’s programmes.

Our Akvo FLOW and Akvo RSR brochures can now be found in various languages, and for various regions, in our new ‘Downloads’ area at the bottom of the relevant product page.  

These changes can be found by visiting http://akvo.org/products/rsr/ or http://akvo.org/products/akvoflow/


## New features


### Akvo Sites

A product page for Akvo Sites has been added.  http://www.akvodev.org/products/akvosites/


Github issue: #212 



## Bug fixes & changes


### See it happen - Akvo RSR all projects map

Map controls not rendering correctly.  rsrNetworkMap width was updated from ‘100%’ to ‘none’ in main.css.

http://akvo.org/seeithappen/


Github issue:  #430 


### See it happen dashboard - Akvopedia ’Visits’ 


The statistics were being rendered in Blue when visited on an iPad.  This was due to iOS converting the number into a telephone number link. Link elements are blue according to the stylesheet. An exception for links in the Akvopedia dashboard area has been added.

http://akvo.org/seeithappen/


Github issue:  #431



### Piwik analytics

WP-config.php has been updated to set the javascript tracking code 'domain' for akvo.org, so that this is not overwritten with the incorrect one with every deployment.


Github issue: #411 


### Contact us 

The map on the contact us page has been updated to inlude our West Africa hub.

http://akvo.org/contact-info/


Github issue: #415


### Partner page

Our Partner page has been updated to make it more customisable by the Communications team.  We have also added a link to our main programs http://programmes.akvoapp.org/en/

http://akvo.org/about-us/partners/


Github issue:  #433 & #434


### Akvo RSR Product page

The Akvo RSR product page now links through to proof that we dogfood!  By visiting the ‘Real world use’ area you can click through to Akvo’s programmes.

We have also added product brochures in various languages, and for various regions, in our new ‘Downloads’ area at the bottom of the product page.  

http://akvo.org/products/rsr/


Github issue:  #435 #448 & #392


### Akvo FLOW Product page

The Akvo FLOW product page now links through to proof that we dogfood!  By visiting the ‘Who’s using FLOW?’ area you can click through to Akvo’s programmes.

We have also added product brochures in various languages, and for various regions, in our new ‘Downloads’ area at the bottom of the product page.  

http://akvo.org/products/akvoflow/


Github issue:  #436 & #391

--------

Akvo.org ver 1.1.8 Invisible Ilama
---

Tuesday 21 October 2014, @lynngre

Included changes
---

### WP upgrade 

WP upgrade to 3.9.1

Github issue: [#408](https://github.com/akvo/akvo-web/issues/408)

### Akismet plugin upgrade

Akismet spam plugin upgrade

Github issue: [#406](https://github.com/akvo/akvo-web/issues/406)

### FLOW Monitoring page

Addition of a FLOW Monitoring feature page. 

Github issue: [#338](https://github.com/akvo/akvo-web/issues/338) & [#405](https://github.com/akvo/akvo-web/issues/405)

### Meet out Team

Broken link to twitter on 'Meet our Team' page has been corrected.

Github issue:  [#403] (https://github.com/akvo/akvo-web/issues/403)

Layout issue which appeared on Firefox only, corrected.

Github issue:  [#400](https://github.com/akvo/akvo-web/issues/400)

### Akvo JSON data plugin

Corrected bug which resulted in 'Fetch more updates' on http://akvo.org/seeithappen/all-rsr-project-updates/ rendering a duplication of project updates.

Github issue:  [#397](https://github.com/akvo/akvo-web/issues/397)

###  Homepage

Slider arrows have been added to the Hero Box.

Github issue:  [#393](https://github.com/akvo/akvo-web/issues/393)

### Piwik analytics

Changes to WP-config.php has been updated to set the javascript tracking code 'SiteID' for akvo.org, so that this is not overwritten with the incorrect one with every deployment.

Github issue [#387](https://github.com/akvo/akvo-web/issues/387)

### Contact page

Http://akvo.org/contact-info has been updated with a map & new content.

Github issue [#345](https://github.com/akvo/akvo-web/issues/345)

###  Help and support pages

http://akvo.org/help/help-support/ & the supporting pages have been made customisable to allow the Communications team to update this as/when required.

Github issue [#286](https://github.com/akvo/akvo-web/issues/286)

http://akvodev.org/help/help-support/rsr-help/ has been updated with a link to the Akvo RSR Widget manual.

Github issue [#398](https://github.com/akvo/akvo-web/issues/398)

### Other customisable pages

The Akvo RSR UP product page, the Foundations page and the Annual reports page are now customisable by the Communications team.

Github issue [#339](https://github.com/akvo/akvo-web/issues/339)





--------
