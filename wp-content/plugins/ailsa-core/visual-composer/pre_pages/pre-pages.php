<?php
/* ==============================================
  Try to remove default template
=============================================== */
add_filter( 'vc_load_default_templates', 'ailsa_template_modify_array' );
function ailsa_template_modify_array($data) {
	return array(); // This will remove all default templates
}

/* Large List Full Width Blog */
add_filter( 'vc_load_default_templates', 'vc_ailsa_large_list_fullwidth' );
function vc_ailsa_large_list_fullwidth($data) {
  $template               = array();
  $template['name']       = __( 'Large List Full Width Blog', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_large_post large_post_posts_in="116" mts_opt="" large_post_category="true" large_post_date="true" large_post_author="true" large_post_comments="true" sh_opt="" large_post_excerpt="true" large_post_read_more="true" large_post_share="true" large_post_popup="" large_post_excerpt_length="90"][vcts_blog blog_style="aisa-blog-two" blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="" blog_pagination="true" blog_excerpt_length="26" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Large And List Blog */
add_filter( 'vc_load_default_templates', 'vc_ailsa_large_list_blog' );
function vc_ailsa_large_list_blog($data) {
  $template               = array();
  $template['name']       = __( 'Large And List Blog', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_large_post large_post_posts_in="116" large_post_category="true" large_post_date="true" large_post_author="true" large_post_comments="true" large_post_excerpt="true" large_post_read_more="true" large_post_share="true" large_post_popup="" large_post_excerpt_length="90"][vcts_blog blog_style="aisa-blog-two" blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="" blog_pagination="true" blog_excerpt_length="26" lsng_opt="" blog_order="DESC" blog_orderby="date" class="class"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Large Grid Full Width Blog */
add_filter( 'vc_load_default_templates', 'vc_ailsa_large_grid_fullwidth' );
function vc_ailsa_large_grid_fullwidth($data) {
  $template               = array();
  $template['name']       = __( 'Large Grid Full Width Blog', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_large_post large_post_posts_in="116" mts_opt="" large_post_category="true" large_post_date="true" large_post_author="true" large_post_comments="true" sh_opt="" large_post_excerpt="true" large_post_read_more="true" large_post_share="true" large_post_popup="" large_post_excerpt_length="90"][vcts_blog blog_column="aisa-blog-col-2" blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="24" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Large And Grid Blog */
add_filter( 'vc_load_default_templates', 'vc_ailsa_large_grid' );
function vc_ailsa_large_grid($data) {
  $template               = array();
  $template['name']       = __( 'Large And Grid Blog', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_large_post large_post_posts_in="482" mts_opt="" large_post_category="true" large_post_date="true" large_post_author="true" large_post_comments="true" sh_opt="" large_post_excerpt="true" large_post_read_more="true" large_post_share="true" large_post_popup="" large_post_excerpt_length="90"][vcts_blog blog_column="aisa-blog-col-2" blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="23" lsng_opt=""][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* List – Full Width */
add_filter( 'vc_load_default_templates', 'vc_ailsa_list_fullwidth' );
function vc_ailsa_list_fullwidth($data) {
  $template               = array();
  $template['name']       = __( 'List – Full Width', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_blog blog_style="aisa-blog-two" blog_limit="9" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="" blog_pagination="true" blog_excerpt_length="26" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* List – Sidebar */
add_filter( 'vc_load_default_templates', 'vc_ailsa_list_with_sidebar' );
function vc_ailsa_list_with_sidebar($data) {
  $template               = array();
  $template['name']       = __( 'List – Sidebar', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_blog blog_style="aisa-blog-two" blog_limit="9" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="" blog_pagination="true" blog_excerpt_length="25" lsng_opt=""][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Grid – Full Width */
add_filter( 'vc_load_default_templates', 'vc_ailsa_grid_fullwidth' );
function vc_ailsa_grid_fullwidth($data) {
  $template               = array();
  $template['name']       = __( 'Grid – Full Width', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row overlay_dotted=""][vc_column][vcts_blog blog_column="aisa-blog-col-3" blog_limit="9" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="22" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Grid – Sidebar */
add_filter( 'vc_load_default_templates', 'vc_ailsa_grid_with_sidebar' );
function vc_ailsa_grid_with_sidebar($data) {
  $template               = array();
  $template['name']       = __( 'Grid – Sidebar', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row overlay_dotted=""][vc_column][vcts_blog blog_column="aisa-blog-col-2" blog_limit="8" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="" sh_opt="" blog_popup="" blog_share="" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="22" lsng_opt="" blog_order="DESC" blog_orderby="date" read_more_txt="read moreeeeeeeee" blog_posts_in=""][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Standard – Full Width */
add_filter( 'vc_load_default_templates', 'vc_ailsa_std_fullwidth' );
function vc_ailsa_std_fullwidth($data) {
  $template               = array();
  $template['name']       = __( 'Standard – Full Width', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vcts_blog blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="true" sh_opt="" blog_popup="" blog_share="true" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="80" blog_pagination_style="aisa-pagination-two" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Standard – With Sidebar */
add_filter( 'vc_load_default_templates', 'vc_ailsa_std_with_sidebar' );
function vc_ailsa_std_with_sidebar($data) {
  $template               = array();
  $template['name']       = __( 'Standard – With Sidebar', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row overlay_dotted="" css=".vc_custom_1475783627605{padding-top: 0px !important;}"][vc_column][vcts_blog blog_limit="6" mts_opt="" blog_category="true" blog_date="true" blog_author="true" blog_comments="true" sh_opt="" blog_popup="" blog_share="true" blog_excerpt="true" blog_read_more="true" blog_pagination="true" blog_excerpt_length="90" lsng_opt="" blog_order="DESC" blog_orderby="date"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Full Width */
add_filter( 'vc_load_default_templates', 'vc_ailsa_fullwidth_page' );
function vc_ailsa_fullwidth_page($data) {
  $template               = array();
  $template['name']       = __( 'Full Width', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vc_single_image img_size="full" alignment="center"][vc_column_text css=".vc_custom_1479967485217{padding-top: 42px !important;padding-right: 42px !important;padding-bottom: 24px !important;padding-left: 42px !important;background-color: #ffffff !important;}"]
<h2 class="page-title" style="text-align: center;">Fullwidth Page</h2>
Enthusiastically mesh long-term high-impact infrastructures vis-a-vis efficient customer service. <mark>Pinnace holystone togots </mark>mast Compellingly embrace empowered e-business after user friendly intellectual capital. Interactively actualize front-end processes with effective convergence. Synergistically deliver performance based methods of empowerment whereas distributed expertise.

Appropriately empower dynamic leadership skills after business portals. Globally myocardinate interactive supply chains with distinctive quality vectors. Globally revolutionize global sources through interoperable services.Enthusiastically mesh long-term high-impact infrastructures.
<h3>Music Makes Re-Freshness</h3>
Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring. Leverage agile frameworks to provide a robust synopsis for high level overviews.
<blockquote>"People think focus means saying yes to the thing you've got to focus on. But that's loop on focusing solely on the bottom line not what it means at all building into the identity and culture."</blockquote>
Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for <span style="color: #000;">real-time schemas.</span>
[vc_empty_space height="10px"]
<h3>Ordered List</h3>
Collaboratively administrate empowered markets ho <mark><u>shrouds spirits boom </u></mark>to Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.
<ol>
	<li>Mustache waistcoat</li>
	<li>Drinking vinegar</li>
	<li>Plaid flannel brooklyn</li>
	<li>Skateboard cred</li>
</ol>
[vc_empty_space height="27px"]
<h3>Unordered List</h3>
Objectively innovate <mark class="dark">parrel provost Sail ho shrouds spirits </mark>boomCollaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or "organic" sources.
<ul>
	<li>Helvetica selvage green</li>
	<li>Master cleanse</li>
	<li>Retro locavore kitsch</li>
	<li>Vinyl flexitarian</li>
</ul>
[vc_empty_space height="27px"]
<h3>Some other styles</h3>
<strong>Bold Text: This text is bolded my default markup.</strong>

<strong>Italic: </strong><em>This text is emphasize.</em>

<strong>Strike-through: </strong><del>I am a strike-through text.</del>

<strong>Link: </strong><a href="http://victorthemes.com/html2/ailsa/fullwidth-page.html#">I'm a link text</a>

<strong>Inline Code: </strong><code>Its an Inline code example</code>[/vc_column_text][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* Contact Me */
add_filter( 'vc_load_default_templates', 'vc_ailsa_contact_me' );
function vc_ailsa_contact_me($data) {
  $template               = array();
  $template['name']       = __( 'Contact Me', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row][vc_column][vc_single_image img_size="full"][/vc_column][/vc_row][vc_row overlay_dotted="" css=".vc_custom_1477323458177{margin: 0px !important;border-width: 0px !important;padding: 0px !important;background-color: #ffffff !important;}"][vc_column css=".vc_custom_1477323499699{margin: 0px !important;border-width: 0px !important;padding: 0px !important;}"][vc_column_text css=".vc_custom_1477323703348{padding-bottom: 10px !important;}"]
<h2 style="text-align: center;">Contact me</h2>
Please feel free to contact me, i'm always on the hunt for the lastests products in <mark>fashion, sneakers, interior </mark>and more. nestingo nipperkin grog yardarm hemp halte Swab barque interloper chanteys the dou bloon star board for general / work / booking inquiries please contact me at <a href="mailto:ailsa@example.com"><mark class="dark">ailsa@example.com</mark></a>[/vc_column_text][contact-form-7 id="5"][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}

/* About Me */
add_filter( 'vc_load_default_templates', 'vc_ailsa_about_me' );
function vc_ailsa_about_me($data) {
  $template               = array();
  $template['name']       = __( 'About Me', 'ailsa-core' );
  $template['content']    = <<<CONTENT
[vc_row overlay_dotted="" css=".vc_custom_1476715885228{margin-bottom: 32px !important;}"][vc_column][vc_single_image img_size="full" alignment="center"][vc_column_text css=".vc_custom_1479299363504{background-color: #ffffff !important;}"]
<h1 style="text-align: center;">Hi I'am Cristan Stewart</h1>
<pre style="text-align: center;">PHOTOGRAPHER &amp; BLOGGER</pre>
<span style="font-size: 15px;">Appropriately empower dynamic leadership skills after business portals. Globally myocardinate interactive supply chains with distinctive quality vectors. Globally revolutionize global sources through interoperable services.Quickly aggregate and worldwide potentialities. <mark class="dark">spirits boom yardarm </mark> supply chains with distinctive quality vectors. Globally revolutionize global sources through interoperable services.</span>

<span style="font-size: 15px;">Dynamically reinvent market-driven opportunities, <mark>fingerstache single-origin </mark>coffee Enthusiastically mesh long-term high-impact infrastructures vis-a-vis efficient customer service. Professionally fashion wireless leadership rather than prospective experiences. Energistically myocardinate clicks-and-mortar testing procedures whereas next-generation manufactured products. <mark class="dark">knausgaard portland keytar </mark>pop-up. Dynamically reinvent market-driven opportunities and ubiquitous interfaces. Energistically fabricate an expanded array of niche markets through robust products.</span>

<span style="font-size: 15px;">Compellingly embrace empowered e-business after user friendly intellectual capital. Interactively actualize front-end processes with effective convergence. Synergistically deliver performance based methods of empowerment whereas distributed expertise.</span>

&nbsp;

[vt_socials social_select="style-two" custom_class="align-right" border_color="rgba(0,0,0,0.0)"][vt_social social_link="#" social_icon="fa fa-facebook" target_tab="1"][vt_social social_link="#" social_icon="fa fa-twitter" target_tab="1"][vt_social social_link="#" social_icon="fa fa-pinterest-p" target_tab="1"][vt_social social_link="#" social_icon="fa fa-google-plus" target_tab="1"][/vt_socials][/vc_column_text][/vc_column][/vc_row]
CONTENT;
  array_unshift($data, $template);
  return $data;
}