<?php
//============================================================+
// File name   : tcpdf.php
// Version     : 6.3.2
// Begin       : 2002-08-03
// Last Update : 2019-09-20
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2002-2019 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description :
//   This is a PHP class for generating PDF documents without requiring external extensions.
//
// NOTE:
//   This class was originally derived in 2002 from the Public
//   Domain FPDF class by Olivier Plathey (http://www.fpdf.org),
//   but now is almost entirely rewritten and contains thousands of
//   new lines of code and hundreds new features.
//
// Main features:
//  * no external libraries are required for the basic functions;
//  * all standard page formats, custom page formats, custom margins and units of measure;
//  * UTF-8 Unicode and Right-To-Left languages;
//  * TrueTypeUnicode, TrueType, Type1 and CID-0 fonts;
//  * font subsetting;
//  * methods to publish some XHTML + CSS code, Javascript and Forms;
//  * images, graphic (geometric figures) and transformation methods;
//  * supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImageMagick (http://www.imagemagick.org/www/formats.html)
//  * 1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extension, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, Datamatrix, QR-Code, PDF417;
//  * JPEG and PNG ICC profiles, Grayscale, RGB, CMYK, Spot Colors and Transparencies;
//  * automatic page header and footer management;
//  * document encryption up to 256 bit and digital signature certifications;
//  * transactions to UNDO commands;
//  * PDF annotations, including links, text and file attachments;
//  * text rendering modes (fill, stroke and clipping);
//  * multiple columns mode;
//  * no-write page regions;
//  * bookmarks, named destinations and table of content;
//  * text hyphenation;
//  * text stretching and spacing (tracking);
//  * automatic page break, line break and text alignments including justification;
//  * automatic page numbering and page groups;
//  * move and delete pages;
//  * page compression (requires php-zlib extension);
//  * XOBject Templates;
//  * Layers and object visibility.
//	* PDF/A-1b support
//============================================================+

/**
 * @file
 * This is a PHP class for generating PDF documents without requiring external extensions.<br>
 * TCPDF project (http://www.tcpdf.org) was originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * <h3>TCPDF main features are:</h3>
 * <ul>
 * <li>no external libraries are required for the basic functions;</li>
 * <li>all standard page formats, custom page formats, custom margins and units of measure;</li>
 * <li>UTF-8 Unicode and Right-To-Left languages;</li>
 * <li>TrueTypeUnicode, TrueType, Type1 and CID-0 fonts;</li>
 * <li>font subsetting;</li>
 * <li>methods to publish some XHTML + CSS code, Javascript and Forms;</li>
 * <li>images, graphic (geometric figures) and transformation methods;
 * <li>supports JPEG, PNG and SVG images natively, all images supported by GD (GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM) and all images supported via ImageMagick (http://www.imagemagick.org/www/formats.html)</li>
 * <li>1D and 2D barcodes: CODE 39, ANSI MH10.8M-1983, USD-3, 3 of 9, CODE 93, USS-93, Standard 2 of 5, Interleaved 2 of 5, CODE 128 A/B/C, 2 and 5 Digits UPC-Based Extension, EAN 8, EAN 13, UPC-A, UPC-E, MSI, POSTNET, PLANET, RMS4CC (Royal Mail 4-state Customer Code), CBC (Customer Bar Code), KIX (Klant index - Customer index), Intelligent Mail Barcode, Onecode, USPS-B-3200, CODABAR, CODE 11, PHARMACODE, PHARMACODE TWO-TRACKS, Datamatrix, QR-Code, PDF417;</li>
 * <li>JPEG and PNG ICC profiles, Grayscale, RGB, CMYK, Spot Colors and Transparencies;</li>
 * <li>automatic page header and footer management;</li>
 * <li>document encryption up to 256 bit and digital signature certifications;</li>
 * <li>transactions to UNDO commands;</li>
 * <li>PDF annotations, including links, text and file attachments;</li>
 * <li>text rendering modes (fill, stroke and clipping);</li>
 * <li>multiple columns mode;</li>
 * <li>no-write page regions;</li>
 * <li>bookmarks, named destinations and table of content;</li>
 * <li>text hyphenation;</li>
 * <li>text stretching and spacing (tracking);</li>
 * <li>automatic page break, line break and text alignments including justification;</li>
 * <li>automatic page numbering and page groups;</li>
 * <li>move and delete pages;</li>
 * <li>page compression (requires php-zlib extension);</li>
 * <li>XOBject Templates;</li>
 * <li>Layers and object visibility;</li>
 * <li>PDF/A-1b support.</li>
 * </ul>
 * Tools to encode your unicode fonts are on fonts/utils directory.</p>
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 6.3.2
 */

// TCPDF configuration
require_once(dirname(__FILE__).'/tcpdf_autoconfig.php');
// TCPDF static font methods and data
require_once(dirname(__FILE__).'/include/tcpdf_font_data.php');
// TCPDF static font methods and data
require_once(dirname(__FILE__).'/include/tcpdf_fonts.php');
// TCPDF static color methods and data
require_once(dirname(__FILE__).'/include/tcpdf_colors.php');
// TCPDF static image methods and data
require_once(dirname(__FILE__).'/include/tcpdf_images.php');
// TCPDF static methods and data
require_once(dirname(__FILE__).'/include/tcpdf_static.php');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

/**
 * @class TCPDF
 * PHP class for generating PDF documents without requiring external extensions.
 * TCPDF project (http://www.tcpdf.org) has been originally derived in 2002 from the Public Domain FPDF class by Olivier Plathey (http://www.fpdf.org), but now is almost entirely rewritten.<br>
 * @package com.tecnick.tcpdf
 * @brief PHP class for generating PDF documents without requiring external extensions.
 * @version 6.3.2
 * @author Nicola Asuni - info@tecnick.com
 * @IgnoreAnnotation("protected")
 * @IgnoreAnnotation("public")
 * @IgnoreAnnotation("pre")
 */
class TCPDF {

	// Protected properties

	/**
	 * Current page number.
	 * @protected
	 */
	protected $page;

	/**
	 * Current object number.
	 * @protected
	 */
	protected $n;

	/**
	 * Array of object offsets.
	 * @protected
	 */
	protected $offsets = array();

	/**
	 * Array of object IDs for each page.
	 * @protected
	 */
	protected $pageobjects = array();

	/**
	 * Buffer holding in-memory PDF.
	 * @protected
	 */
	protected $buffer;

	/**
	 * Array containing pages.
	 * @protected
	 */
	protected $pages = array();

	/**
	 * Current document state.
	 * @protected
	 */
	protected $state;

	/**
	 * Compression flag.
	 * @protected
	 */
	protected $compress;

	/**
	 * Current page orientation (P = Portrait, L = Landscape).
	 * @protected
	 */
	protected $CurOrientation;

	/**
	 * Page dimensions.
	 * @protected
	 */
	protected $pagedim = array();

	/**
	 * Scale factor (number of points in user unit).
	 * @protected
	 */
	protected $k;

	/**
	 * Width of page format in points.
	 * @protected
	 */
	protected $fwPt;

	/**
	 * Height of page format in points.
	 * @protected
	 */
	protected $fhPt;

	/**
	 * Current width of page in points.
	 * @protected
	 */
	protected $wPt;

	/**
	 * Current height of page in points.
	 * @protected
	 */
	protected $hPt;

	/**
	 * Current width of page in user unit.
	 * @protected
	 */
	protected $w;

	/**
	 * Current height of page in user unit.
	 * @protected
	 */
	protected $h;

	/**
	 * Left margin.
	 * @protected
	 */
	protected $lMargin;

	/**
	 * Right margin.
	 * @protected
	 */
	protected $rMargin;

	/**
	 * Cell left margin (used by regions).
	 * @protected
	 */
	protected $clMargin;

	/**
	 * Cell right margin (used by regions).
	 * @protected
	 */
	protected $crMargin;

	/**
	 * Top margin.
	 * @protected
	 */
	protected $tMargin;

	/**
	 * Page break margin.
	 * @protected
	 */
	protected $bMargin;

	/**
	 * Array of cell internal paddings ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
	 * @since 5.9.000 (2010-10-03)
	 * @protected
	 */
	protected $cell_padding = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * Array of cell margins ('T' => top, 'R' => right, 'B' => bottom, 'L' => left).
	 * @since 5.9.000 (2010-10-04)
	 * @protected
	 */
	protected $cell_margin = array('T' => 0, 'R' => 0, 'B' => 0, 'L' => 0);

	/**
	 * Current horizontal position in user unit for cell positioning.
	 * @protected
	 */
	protected $x;

	/**
	 * Current vertical position in user unit for cell positioning.
	 * @protected
	 */
	protected $y;

	/**
	 * Height of last cell printed.
	 * @protected
	 */
	protected $lasth;

	/**
	 * Line width in user unit.
	 * @protected
	 */
	protected $LineWidth;

	/**
	 * Array of standard font names.
	 * @protected
	 */
	protected $CoreFonts;

	/**
	 * Array of used fonts.
	 * @protected
	 */
	protected $fonts = array();

	/**
	 * Array of font files.
	 * @protected
	 */
	protected $FontFiles = array();

	/**
	 * Array of encoding differences.
	 * @protected
	 */
	protected $diffs = array();

	/**
	 * Array of used images.
	 * @protected
	 */
	protected $images = array();

	/**
	 * Depth of the svg tag, to keep track if the svg tag is a subtag or the root tag.
	 * @protected
	 */
	protected $svg_tag_depth = 0;

	/**
	 * Array of Annotations in pages.
	 * @protected
	 */
	protected $PageAnnots = array();

	/**
	 * Array of internal links.
	 * @protected
	 */
	protected $links = array();

	/**
	 * Current font family.
	 * @protected
	 */
	protected $FontFamily;

	/**
	 * Current font style.
	 * @protected
	 */
	protected $FontStyle;

	/**
	 * Current font ascent (distance between font top and baseline).
	 * @protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontAscent;

	/**
	 * Current font descent (distance between font bottom and baseline).
	 * @protected
	 * @since 2.8.000 (2007-03-29)
	 */
	protected $FontDescent;

	/**
	 * Underlining flag.
	 * @protected
	 */
	protected $underline;

	/**
	 * Overlining flag.
	 * @protected
	 */
	protected $overline;

	/**
	 * Current font info.
	 * @protected
	 */
	protected $CurrentFont;

	/**
	 * Current font size in points.
	 * @protected
	 */
	protected $FontSizePt;

	/**
	 * Current font size in user unit.
	 * @protected
	 */
	protected $FontSize;

	/**
	 * Commands for drawing color.
	 * @protected
	 */
	protected $DrawColor;

	/**
	 * Commands for filling color.
	 * @protected
	 */
	protected $FillColor;

	/**
	 * Commands for text color.
	 * @protected
	 */
	protected $TextColor;

	/**
	 * Indicates whether fill and text colors are different.
	 * @protected
	 */
	protected $ColorFlag;

	/**
	 * Automatic page breaking.
	 * @protected
	 */
	protected $AutoPageBreak;

	/**
	 * Threshold used to trigger page breaks.
	 * @protected
	 */
	protected $PageBreakTrigger;

	/**
	 * Flag set when processing page header.
	 * @protected
	 */
	protected $InHeader = false;

	/**
	 * Flag set when processing page footer.
	 * @protected
	 */
	protected $InFooter = false;

	/**
	 * Zoom display mode.
	 * @protected
	 */
	protected $ZoomMode;

	/**
	 * Layout display mode.
	 * @protected
	 */
	protected $LayoutMode;

	/**
	 * If true set the document information dictionary in Unicode.
	 * @protected
	 */
	protected $docinfounicode = true;

	/**
	 * Document title.
	 * @protected
	 */
	protected $title = '';

	/**
	 * Document subject.
	 * @protected
	 */
	protected $subject = '';

	/**
	 * Document author.
	 * @protected
	 */
	protected $author = '';

	/**
	 * Document keywords.
	 * @protected
	 */
	protected $keywords = '';

	/**
	 * Document creator.
	 * @protected
	 */
	protected $creator = '';

	/**
	 * Starting page number.
	 * @protected
	 */
	protected $starting_page_number = 1;

	/**
	 * The right-bottom (or left-bottom for RTL) corner X coordinate of last inserted image.
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $img_rb_x;

	/**
	 * The right-bottom corner Y coordinate of last inserted image.
	 * @since 2002-07-31
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $img_rb_y;

	/**
	 * Adjusting factor to convert pixels to user units.
	 * @since 2004-06-14
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $imgscale = 1;

	/**
	 * Boolean flag set to true when the input text is unicode (require unicode fonts).
	 * @since 2005-01-02
	 * @author Nicola Asuni
	 * @protected
	 */
	protected $isunicode = false;

	/**
	 * PDF version.
	 * @since 1.5.3
	 * @protected
	 */
	protected $PDFVersion = '1.7';

	/**
	 * ID of the stored default header template (-1 = not set).
	 * @protected
	 */
	protected $header_xobjid = false;

	/**
	 * If true reset the Header Xobject template at each page
	 * @protected
	 */
	protected $header_xobj_autoreset = false;

	/**
	 * Minimum distance between header and top page margin.
	 * @protected
	 */
	protected $header_margin;

	/**
	 * Minimum distance between footer and bottom page margin.
	 * @protected
	 */
	protected $footer_margin;

	/**
	 * Original left margin value.
	 * @protected
	 * @since 1.53.0.TC013
	 */
	protected $original_lMargin;

	/**
	 * Original right margin value.
	 * @protected
	 * @since 1.53.0.TC013
	 */
	protected $original_rMargin;

	/**
	 * Default font used on page header.
	 * @protected
	 * @var array<int,string>
	 */
	protected $header_font;

	/**
	 * Default font used on page footer.
	 * @protected
	 * @var array<int,string>
	 */
	protected $footer_font;

	/**
	 * Language templates.
	 * @protected
	 */
	protected $l;

	/**
	 * Barcode to print on page footer (only if set).
	 * @protected
	 */
	protected $barcode = false;

	/**
	 * Boolean flag to print/hide page header.
	 * @protected
	 */
	protected $print_header = true;

	/**
	 * Boolean flag to print/hide page footer.
	 * @protected
	 */
	protected $print_footer = true;

	/**
	 * Header image logo.
	 * @protected
	 */
	protected $header_logo = '';

	/**
	 * Width of header image logo in user units.
	 * @protected
	 */
	protected $header_logo_width = 30;

	/**
	 * Title to be printed on default page header.
	 * @protected
	 */
	protected $header_title = '';

	/**
	 * String to pring on page header after title.
	 * @protected
	 */
	protected $header_string = '';

	/**
	 * Color for header text (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $header_text_color = array(0,0,0);

	/**
	 * Color for header line (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $header_line_color = array(0,0,0);

	/**
	 * Color for footer text (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $footer_text_color = array(0,0,0);

	/**
	 * Color for footer line (RGB array).
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $footer_line_color = array(0,0,0);

	/**
	 * Text shadow data array.
	 * @since 5.9.174 (2012-07-25)
	 * @protected
	 */
	protected $txtshadow = array('enabled'=>false, 'depth_w'=>0, 'depth_h'=>0, 'color'=>false, 'opacity'=>1, 'blend_mode'=>'Normal');

	/**
	 * Default number of columns for html table.
	 * @protected
	 */
	protected $default_table_columns = 4;

	// variables for html parser

	/**
	 * HTML PARSER: array to store current link and rendering styles.
	 * @protected
	 */
	protected $HREF = array();

	/**
	 * List of available fonts on filesystem.
	 * @protected
	 */
	protected $fontlist = array();

	/**
	 * Current foreground color.
	 * @protected
	 */
	protected $fgcolor;

	/**
	 * HTML PARSER: array of boolean values, true in case of ordered list (OL), false otherwise.
	 * @protected
	 */
	protected $listordered = array();

	/**
	 * HTML PARSER: array count list items on nested lists.
	 * @protected
	 */
	protected $listcount = array();

	/**
	 * HTML PARSER: current list nesting level.
	 * @protected
	 */
	protected $listnum = 0;

	/**
	 * HTML PARSER: indent amount for lists.
	 * @protected
	 */
	protected $listindent = 0;

	/**
	 * HTML PARSER: current list indententation level.
	 * @protected
	 */
	protected $listindentlevel = 0;

	/**
	 * Current background color.
	 * @protected
	 */
	protected $bgcolor;

	/**
	 * Temporary font size in points.
	 * @protected
	 */
	protected $tempfontsize = 10;

	/**
	 * Spacer string for LI tags.
	 * @protected
	 */
	protected $lispacer = '';

	/**
	 * Default encoding.
	 * @protected
	 * @since 1.53.0.TC010
	 */
	protected $encoding = 'UTF-8';

	/**
	 * Boolean flag to indicate if the document language is Right-To-Left.
	 * @protected
	 * @since 2.0.000
	 */
	protected $rtl = false;

	/**
	 * Boolean flag used to force RTL or LTR string direction.
	 * @protected
	 * @since 2.0.000
	 */
	protected $tmprtl = false;

	// --- Variables used for document encryption:

	/**
	 * IBoolean flag indicating whether document is protected.
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $encrypted;

	/**
	 * Array containing encryption settings.
	 * @protected
	 * @since 5.0.005 (2010-05-11)
	 */
	protected $encryptdata = array();

	/**
	 * Last RC4 key encrypted (cached for optimisation).
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key;

	/**
	 * Last RC4 computed key.
	 * @protected
	 * @since 2.0.000 (2008-01-02)
	 */
	protected $last_enc_key_c;

	/**
	 * File ID (used on document trailer).
	 * @protected
	 * @since 5.0.005 (2010-05-12)
	 */
	protected $file_id;

	// --- bookmark ---

	/**
	 * Outlines for bookmark.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $outlines = array();

	/**
	 * Outline root for bookmark.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $OutlineRoot;

	// --- javascript and form ---

	/**
	 * Javascript code.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $javascript = '';

	/**
	 * Javascript counter.
	 * @protected
	 * @since 2.1.002 (2008-02-12)
	 */
	protected $n_js;

	/**
	 * line through state
	 * @protected
	 * @since 2.8.000 (2008-03-19)
	 */
	protected $linethrough;

	/**
	 * Array with additional document-wide usage rights for the document.
	 * @protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $ur = array();

	/**
	 * DPI (Dot Per Inch) Document Resolution (do not change).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $dpi = 72;

	/**
	 * Array of page numbers were a new page group was started (the page numbers are the keys of the array).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $newpagegroup = array();

	/**
	 * Array that contains the number of pages in each page group.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $pagegroups = array();

	/**
	 * Current page group number.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $currpagegroup = 0;

	/**
	 * Array of transparency objects and parameters.
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $extgstates;

	/**
	 * Set the default JPEG compression quality (1-100).
	 * @protected
	 * @since 3.0.000 (2008-03-27)
	 */
	protected $jpeg_quality;

	/**
	 * Default cell height ratio.
	 * @protected
	 * @since 3.0.014 (2008-05-23)
	 */
	protected $cell_height_ratio = K_CELL_HEIGHT_RATIO;

	/**
	 * PDF viewer preferences.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $viewer_preferences;

	/**
	 * A name object specifying how the document should be displayed when opened.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $PageMode;

	/**
	 * Array for storing gradient information.
	 * @protected
	 * @since 3.1.000 (2008-06-09)
	 */
	protected $gradients = array();

	/**
	 * Array used to store positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 3.2.000 (2008-06-26)
	 */
	protected $intmrk = array();

	/**
	 * Array used to store positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 5.7.000 (2010-08-03)
	 */
	protected $bordermrk = array();

	/**
	 * Array used to store page positions to track empty pages (keys are the page numbers).
	 * @protected
	 * @since 5.8.007 (2010-08-18)
	 */
	protected $emptypagemrk = array();

	/**
	 * Array used to store content positions inside the pages buffer (keys are the page numbers).
	 * @protected
	 * @since 4.6.021 (2009-07-20)
	 */
	protected $cntmrk = array();

	/**
	 * Array used to store footer positions of each page.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $footerpos = array();

	/**
	 * Array used to store footer length of each page.
	 * @protected
	 * @since 4.0.014 (2008-07-29)
	 */
	protected $footerlen = array();

	/**
	 * Boolean flag to indicate if a new line is created.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $newline = true;

	/**
	 * End position of the latest inserted line.
	 * @protected
	 * @since 3.2.000 (2008-07-01)
	 */
	protected $endlinex = 0;

	/**
	 * PDF string for width value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleWidth = '';

	/**
	 * PDF string for CAP value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleCap = '0 J';

	/**
	 * PDF string for join value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleJoin = '0 j';

	/**
	 * PDF string for dash value of the last line.
	 * @protected
	 * @since 4.0.006 (2008-07-16)
	 */
	protected $linestyleDash = '[] 0 d';

	/**
	 * Boolean flag to indicate if marked-content sequence is open.
	 * @protected
	 * @since 4.0.013 (2008-07-28)
	 */
	protected $openMarkedContent = false;

	/**
	 * Count the latest inserted vertical spaces on HTML.
	 * @protected
	 * @since 4.0.021 (2008-08-24)
	 */
	protected $htmlvspace = 0;

	/**
	 * Array of Spot colors.
	 * @protected
	 * @since 4.0.024 (2008-09-12)
	 */
	protected $spot_colors = array();

	/**
	 * Symbol used for HTML unordered list items.
	 * @protected
	 * @since 4.0.028 (2008-09-26)
	 */
	protected $lisymbol = '';

	/**
	 * String used to mark the beginning and end of EPS image blocks.
	 * @protected
	 * @since 4.1.000 (2008-10-18)
	 */
	protected $epsmarker = 'x#!#EPS#!#x';

	/**
	 * Array of transformation matrix.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $transfmatrix = array();

	/**
	 * Current key for transformation matrix.
	 * @protected
	 * @since 4.8.005 (2009-09-17)
	 */
	protected $transfmatrix_key = 0;

	/**
	 * Booklet mode for double-sided pages.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $booklet = false;

	/**
	 * Epsilon value used for float calculations.
	 * @protected
	 * @since 4.2.000 (2008-10-29)
	 */
	protected $feps = 0.005;

	/**
	 * Array used for custom vertical spaces for HTML tags.
	 * @protected
	 * @since 4.2.001 (2008-10-30)
	 */
	protected $tagvspaces = array();

	/**
	 * HTML PARSER: custom indent amount for lists. Negative value means disabled.
	 * @protected
	 * @since 4.2.007 (2008-11-12)
	 */
	protected $customlistindent = -1;

	/**
	 * Boolean flag to indicate if the border of the cell sides that cross the page should be removed.
	 * @protected
	 * @since 4.2.010 (2008-11-14)
	 */
	protected $opencell = true;

	/**
	 * Array of files to embedd.
	 * @protected
	 * @since 4.4.000 (2008-12-07)
	 */
	protected $embeddedfiles = array();

	/**
	 * Boolean flag to indicate if we are inside a PRE tag.
	 * @protected
	 * @since 4.4.001 (2008-12-08)
	 */
	protected $premode = false;

	/**
	 * Array used to store positions of graphics transformation blocks inside the page buffer.
	 * keys are the page numbers
	 * @protected
	 * @since 4.4.002 (2008-12-09)
	 */
	protected $transfmrk = array();

	/**
	 * Default color for html links.
	 * @protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkColorArray = array(0, 0, 255);

	/**
	 * Default font style to add to html links.
	 * @protected
	 * @since 4.4.003 (2008-12-09)
	 */
	protected $htmlLinkFontStyle = 'U';

	/**
	 * Counts the number of pages.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numpages = 0;

	/**
	 * Array containing page lengths in bytes.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $pagelen = array();

	/**
	 * Counts the number of pages.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $numimages = 0;

	/**
	 * Store the image keys.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $imagekeys = array();

	/**
	 * Length of the buffer in bytes.
	 * @protected
	 * @since 4.5.000 (2008-12-31)
	 */
	protected $bufferlen = 0;

	/**
	 * Counts the number of fonts.
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $numfonts = 0;

	/**
	 * Store the font keys.
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $fontkeys = array();

	/**
	 * Store the font object IDs.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $font_obj_ids = array();

	/**
	 * Store the fage status (true when opened, false when closed).
	 * @protected
	 * @since 4.5.000 (2009-01-02)
	 */
	protected $pageopen = array();

	/**
	 * Default monospace font.
	 * @protected
	 * @since 4.5.025 (2009-03-10)
	 */
	protected $default_monospaced_font = 'courier';

	/**
	 * Cloned copy of the current class object.
	 * @protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $objcopy;

	/**
	 * Array used to store the lengths of cache files.
	 * @protected
	 * @since 4.5.029 (2009-03-19)
	 */
	protected $cache_file_length = array();

	/**
	 * Table header content to be repeated on each new page.
	 * @protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $thead = '';

	/**
	 * Margins used for table header.
	 * @protected
	 * @since 4.5.030 (2009-03-20)
	 */
	protected $theadMargins = array();

	/**
	 * Boolean flag to enable document digital signature.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $sign = false;

	/**
	 * Digital signature data.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_data = array();

	/**
	 * Digital signature max length.
	 * @protected
	 * @since 4.6.005 (2009-04-24)
	 */
	protected $signature_max_length = 11742;

	/**
	 * Data for digital signature appearance.
	 * @protected
	 * @since 5.3.011 (2010-06-16)
	 */
	protected $signature_appearance = array('page' => 1, 'rect' => '0 0 0 0');

	/**
	 * Array of empty digital signature appearances.
	 * @protected
	 * @since 5.9.101 (2011-07-06)
	 */
	protected $empty_signature_appearance = array();

	/**
	 * Boolean flag to enable document timestamping with TSA.
	 * @protected
	 * @since 6.0.085 (2014-06-19)
	 */
	protected $tsa_timestamp = false;

	/**
	 * Timestamping data.
	 * @protected
	 * @since 6.0.085 (2014-06-19)
	 */
	protected $tsa_data = array();

	/**
	 * Regular expression used to find blank characters (required for word-wrapping).
	 * @protected
	 * @since 4.6.006 (2009-04-28)
	 */
	protected $re_spaces = '/[^\S\xa0]/';

	/**
	 * Array of $re_spaces parts.
	 * @protected
	 * @since 5.5.011 (2010-07-09)
	 */
	protected $re_space = array('p' => '[^\S\xa0]', 'm' => '');

	/**
	 * Digital signature object ID.
	 * @protected
	 * @since 4.6.022 (2009-06-23)
	 */
	protected $sig_obj_id = 0;

	/**
	 * ID of page objects.
	 * @protected
	 * @since 4.7.000 (2009-08-29)
	 */
	protected $page_obj_id = array();

	/**
	 * List of form annotations IDs.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_obj_id = array();

	/**
	 * Deafult Javascript field properties. Possible values are described on official Javascript for Acrobat API reference. Annotation options can be directly specified using the 'aopt' entry.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $default_form_prop = array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 255), 'strokeColor'=>array(128, 128, 128));

	/**
	 * Javascript objects array.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $js_objects = array();

	/**
	 * Current form action (used during XHTML rendering).
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_action = '';

	/**
	 * Current form encryption type (used during XHTML rendering).
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_enctype = 'application/x-www-form-urlencoded';

	/**
	 * Current method to submit forms.
	 * @protected
	 * @since 4.8.000 (2009-09-07)
	 */
	protected $form_mode = 'post';

	/**
	 * List of fonts used on form fields (fontname => fontkey).
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $annotation_fonts = array();

	/**
	 * List of radio buttons parent objects.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radiobutton_groups = array();

	/**
	 * List of radio group objects IDs.
	 * @protected
	 * @since 4.8.001 (2009-09-09)
	 */
	protected $radio_groups = array();

	/**
	 * Text indentation value (used for text-indent CSS attribute).
	 * @protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $textindent = 0;

	/**
	 * Store page number when startTransaction() is called.
	 * @protected
	 * @since 4.8.006 (2009-09-23)
	 */
	protected $start_transaction_page = 0;

	/**
	 * Store Y position when startTransaction() is called.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $start_transaction_y = 0;

	/**
	 * True when we are printing the thead section on a new page.
	 * @protected
	 * @since 4.8.027 (2010-01-25)
	 */
	protected $inthead = false;

	/**
	 * Array of column measures (width, space, starting Y position).
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $columns = array();

	/**
	 * Number of colums.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $num_columns = 1;

	/**
	 * Current column number.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $current_column = 0;

	/**
	 * Starting page for columns.
	 * @protected
	 * @since 4.9.001 (2010-03-28)
	 */
	protected $column_start_page = 0;

	/**
	 * Maximum page and column selected.
	 * @protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $maxselcol = array('page' => 0, 'column' => 0);

	/**
	 * Array of: X difference between table cell x start and starting page margin, cellspacing, cellpadding.
	 * @protected
	 * @since 5.8.000 (2010-08-11)
	 */
	protected $colxshift = array('x' => 0, 's' => array('H' => 0, 'V' => 0), 'p' => array('L' => 0, 'T' => 0, 'R' => 0, 'B' => 0));

	/**
	 * Text rendering mode: 0 = Fill text; 1 = Stroke text; 2 = Fill, then stroke text; 3 = Neither fill nor stroke text (invisible); 4 = Fill text and add to path for clipping; 5 = Stroke text and add to path for clipping; 6 = Fill, then stroke text and add to path for clipping; 7 = Add text to path for clipping.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textrendermode = 0;

	/**
	 * Text stroke width in doc units.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $textstrokewidth = 0;

	/**
	 * Current stroke color.
	 * @protected
	 * @since 4.9.008 (2010-04-03)
	 */
	protected $strokecolor;

	/**
	 * Default unit of measure for document.
	 * @protected
	 * @since 5.0.000 (2010-04-22)
	 */
	protected $pdfunit = 'mm';

	/**
	 * Boolean flag true when we are on TOC (Table Of Content) page.
	 * @protected
	 */
	protected $tocpage = false;

	/**
	 * Boolean flag: if true convert vector images (SVG, EPS) to raster image using GD or ImageMagick library.
	 * @protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $rasterize_vector_images = false;

	/**
	 * Boolean flag: if true enables font subsetting by default.
	 * @protected
	 * @since 5.3.002 (2010-06-07)
	 */
	protected $font_subsetting = true;

	/**
	 * Array of default graphic settings.
	 * @protected
	 * @since 5.5.008 (2010-07-02)
	 */
	protected $default_graphic_vars = array();

	/**
	 * Array of XObjects.
	 * @protected
	 * @since 5.8.014 (2010-08-23)
	 */
	protected $xobjects = array();

	/**
	 * Boolean value true when we are inside an XObject.
	 * @protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $inxobj = false;

	/**
	 * Current XObject ID.
	 * @protected
	 * @since 5.8.017 (2010-08-24)
	 */
	protected $xobjid = '';

	/**
	 * Percentage of character stretching.
	 * @protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_stretching = 100;

	/**
	 * Increases or decreases the space between characters in a text by the specified amount (tracking).
	 * @protected
	 * @since 5.9.000 (2010-09-29)
	 */
	protected $font_spacing = 0;

	/**
	 * Array of no-write regions.
	 * ('page' => page number or empy for current page, 'xt' => X top, 'yt' => Y top, 'xb' => X bottom, 'yb' => Y bottom, 'side' => page side 'L' = left or 'R' = right)
	 * @protected
	 * @since 5.9.003 (2010-10-14)
	 */
	protected $page_regions = array();

	/**
	 * Boolean value true when page region check is active.
	 * @protected
	 */
	protected $check_page_regions = true;

	/**
	 * Array of PDF layers data.
	 * @protected
	 * @since 5.9.102 (2011-07-13)
	 */
	protected $pdflayers = array();

	/**
	 * A dictionary of names and corresponding destinations (Dests key on document Catalog).
	 * @protected
	 * @since 5.9.097 (2011-06-23)
	 */
	protected $dests = array();

	/**
	 * Object ID for Named Destinations
	 * @protected
	 * @since 5.9.097 (2011-06-23)
	 */
	protected $n_dests;

	/**
	 * Embedded Files Names
	 * @protected
	 * @since 5.9.204 (2013-01-23)
	 */
	protected $efnames = array();

	/**
	 * Directory used for the last SVG image.
	 * @protected
	 * @since 5.0.000 (2010-05-05)
	 */
	protected $svgdir = '';

	/**
	 *  Deafult unit of measure for SVG.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgunit = 'px';

	/**
	 * Array of SVG gradients.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradients = array();

	/**
	 * ID of last SVG gradient.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svggradientid = 0;

	/**
	 * Boolean value true when in SVG defs group.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefsmode = false;

	/**
	 * Array of SVG defs.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgdefs = array();

	/**
	 * Boolean value true when in SVG clipPath tag.
	 * @protected
	 * @since 5.0.000 (2010-04-26)
	 */
	protected $svgclipmode = false;

	/**
	 * Array of SVG clipPath commands.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclippaths = array();

	/**
	 * Array of SVG clipPath tranformation matrix.
	 * @protected
	 * @since 5.8.022 (2010-08-31)
	 */
	protected $svgcliptm = array();

	/**
	 * ID of last SVG clipPath.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgclipid = 0;

	/**
	 * SVG text.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgtext = '';

	/**
	 * SVG text properties.
	 * @protected
	 * @since 5.8.013 (2010-08-23)
	 */
	protected $svgtextmode = array();

	/**
	 * Array of SVG properties.
	 * @protected
	 * @since 5.0.000 (2010-05-02)
	 */
	protected $svgstyles = array(array(
		'alignment-baseline' => 'auto',
		'baseline-shift' => 'baseline',
		'clip' => 'auto',
		'clip-path' => 'none',
		'clip-rule' => 'nonzero',
		'color' => 'black',
		'color-interpolation' => 'sRGB',
		'color-interpolation-filters' => 'linearRGB',
		'color-profile' => 'auto',
		'color-rendering' => 'auto',
		'cursor' => 'auto',
		'direction' => 'ltr',
		'display' => 'inline',
		'dominant-baseline' => 'auto',
		'enable-background' => 'accumulate',
		'fill' => 'black',
		'fill-opacity' => 1,
		'fill-rule' => 'nonzero',
		'filter' => 'none',
		'flood-color' => 'black',
		'flood-opacity' => 1,
		'font' => '',
		'font-family' => 'helvetica',
		'font-size' => 'medium',
		'font-size-adjust' => 'none',
		'font-stretch' => 'normal',
		'font-style' => 'normal',
		'font-variant' => 'normal',
		'font-weight' => 'normal',
		'glyph-orientation-horizontal' => '0deg',
		'glyph-orientation-vertical' => 'auto',
		'image-rendering' => 'auto',
		'kerning' => 'auto',
		'letter-spacing' => 'normal',
		'lighting-color' => 'white',
		'marker' => '',
		'marker-end' => 'none',
		'marker-mid' => 'none',
		'marker-start' => 'none',
		'mask' => 'none',
		'opacity' => 1,
		'overflow' => 'auto',
		'pointer-events' => 'visiblePainted',
		'shape-rendering' => 'auto',
		'stop-color' => 'black',
		'stop-opacity' => 1,
		'stroke' => 'none',
		'stroke-dasharray' => 'none',
		'stroke-dashoffset' => 0,
		'stroke-linecap' => 'butt',
		'stroke-linejoin' => 'miter',
		'stroke-miterlimit' => 4,
		'stroke-opacity' => 1,
		'stroke-width' => 1,
		'text-anchor' => 'start',
		'text-decoration' => 'none',
		'text-rendering' => 'auto',
		'unicode-bidi' => 'normal',
		'visibility' => 'visible',
		'word-spacing' => 'normal',
		'writing-mode' => 'lr-tb',
		'text-color' => 'black',
		'transfmatrix' => array(1, 0, 0, 1, 0, 0)
		));

	/**
	 * If true force sRGB color profile for all document.
	 * @protected
	 * @since 5.9.121 (2011-09-28)
	 */
	protected $force_srgb = false;

	/**
	 * If true set the document to PDF/A mode.
	 * @protected
	 * @since 5.9.121 (2011-09-27)
	 */
	protected $pdfa_mode = false;

	/**
	 * version of PDF/A mode (1 - 3).
	 * @protected
	 * @since 6.2.26 (2019-03-12)
	 */
	protected $pdfa_version = 1;

	/**
	 * Document creation date-time
	 * @protected
	 * @since 5.9.152 (2012-03-22)
	 */
	protected $doc_creation_timestamp;

	/**
	 * Document modification date-time
	 * @protected
	 * @since 5.9.152 (2012-03-22)
	 */
	protected $doc_modification_timestamp;

	/**
	 * Custom XMP data.
	 * @protected
	 * @since 5.9.128 (2011-10-06)
	 */
	protected $custom_xmp = '';

	/**
	 * Custom XMP RDF data.
	 * @protected
	 * @since 6.3.0 (2019-09-19)
	 */
	protected $custom_xmp_rdf = '';

	/**
	 * Overprint mode array.
	 * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 * @var array<string,bool|int>
	 */
	protected $overprint = array('OP' => false, 'op' => false, 'OPM' => 0);

	/**
	 * Alpha mode array.
	 * (Check the "Entries in a Graphics State Parameter Dictionary" on PDF 32000-1:2008).
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $alpha = array('CA' => 1, 'ca' => 1, 'BM' => '/Normal', 'AIS' => false);

	/**
	 * Define the page boundaries boxes to be set on document.
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $page_boxes = array('MediaBox', 'CropBox', 'BleedBox', 'TrimBox', 'ArtBox');

	/**
	 * If true print TCPDF meta link.
	 * @protected
	 * @since 5.9.152 (2012-03-23)
	 */
	protected $tcpdflink = true;

	/**
	 * Cache array for computed GD gamma values.
	 * @protected
	 * @since 5.9.1632 (2012-06-05)
	 */
	protected $gdgammacache = array();

    /**
     * Cache array for file content
     * @protected
     * @var array
     * @sinde 6.3.5 (2020-09-28)
     */
	protected $fileContentCache = array();

	/**
	 * Whether to allow local file path in image html tags, when prefixed with file://
	 *
	 * @var bool
	 * @protected
	 * @since 6.4 (2020-07-23)
	 */
	protected $allowLocalFiles = false;

	//------------------------------------------------------------
	// METHODS
	//------------------------------------------------------------

	/**
	 * This is the class constructor.
	 * It allows to set up the page format, the orientation and the measure unit used in all the methods (except for the font sizes).
	 *
	 * @param string $orientation page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
	 * @param string $unit User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
	 * @param mixed $format The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
	 * @param boolean $unicode TRUE means that the input text is unicode (default = true)
	 * @param string $encoding Charset encoding (used only when converting back html entities); default is UTF-8.
	 * @param boolean $diskcache DEPRECATED FEATURE
	 * @param integer $pdfa If not false, set the document to PDF/A mode and the good version (1 or 3).
	 * @public
	 * @see getPageSizeFromFormat(), setPageFormat()
	 */
	public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false) {
		// set file ID for trailer
		$serformat = (is_array($format) ? json_encode($format) : $format);
		$this->file_id = md5(TCPDF_STATIC::getRandomSeed('TCPDF'.$orientation.$unit.$serformat.$encoding));
		$this->font_obj_ids = array();
		$this->page_obj_id = array();
		$this->form_obj_id = array();

		// set pdf/a mode
		if ($pdfa != false) {
			$this->pdfa_mode = true;
			$this->pdfa_version = $pdfa;  // 1 or 3
		} else
			$this->pdfa_mode = false;

		$this->force_srgb = false;
		// set language direction
		$this->rtl = false;
		$this->tmprtl = false;
		// some checks
		$this->_dochecks();
		// initialization of properties
		$this->isunicode = $unicode;
		$this->page = 0;
		$this->transfmrk[0] = array();
		$this->pagedim = array();
		$this->n = 2;
		$this->buffer = '';
		$this->pages = array();
		$this->state = 0;
		$this->fonts = array();
		$this->FontFiles = array();
		$this->diffs = array();
		$this->images = array();
		$this->links = array();
		$this->gradients = array();
		$this->InFooter = false;
		$this->lasth = 0;
		$this->FontFamily = defined('PDF_FONT_NAME_MAIN')?PDF_FONT_NAME_MAIN:'helvetica';
		$this->FontStyle = '';
		$this->FontSizePt = 12;
		$this->underline = false;
		$this->overline = false;
		$this->linethrough = false;
		$this->DrawColor = '0 G';
		$this->FillColor = '0 g';
		$this->TextColor = '0 g';
		$this->ColorFlag = false;
		$this->pdflayers = array();
		// encryption values
		$this->encrypted = false;
		$this->last_enc_key = '';
		// standard Unicode fonts
		$this->CoreFonts = array(
			'courier'=>'Courier',
			'courierB'=>'Courier-Bold',
			'courierI'=>'Courier-Oblique',
			'courierBI'=>'Courier-BoldOblique',
			'helvetica'=>'Helvetica',
			'helveticaB'=>'Helvetica-Bold',
			'helveticaI'=>'Helvetica-Oblique',
			'helveticaBI'=>'Helvetica-BoldOblique',
			'times'=>'Times-Roman',
			'timesB'=>'Times-Bold',
			'timesI'=>'Times-Italic',
			'timesBI'=>'Times-BoldItalic',
			'symbol'=>'Symbol',
			'zapfdingbats'=>'ZapfDingbats'
		);
		// set scale factor
		$this->setPageUnit($unit);
		// set page format and orientation
		$this->setPageFormat($format, $orientation);
		// page margins (1 cm)
		$margin = 28.35 / $this->k;
		$this->SetMargins($margin, $margin);
		$this->clMargin = $this->lMargin;
		$this->crMargin = $this->rMargin;
		// internal cell padding
		$cpadding = $margin / 10;
		$this->setCellPaddings($cpadding, 0, $cpadding, 0);
		// cell margins
		$this->setCellMargins(0, 0, 0, 0);
		// line width (0.2 mm)
		$this->LineWidth = 0.57 / $this->k;
		$this->linestyleWidth = sprintf('%F w', ($this->LineWidth * $this->k));
		$this->linestyleCap = '0 J';
		$this->linestyleJoin = '0 j';
		$this->linestyleDash = '[] 0 d';
		// automatic page break
		$this->SetAutoPageBreak(true, (2 * $margin));
		// full width display mode
		$this->SetDisplayMode('fullwidth');
		// compression
		$this->SetCompression();
		// set default PDF version number
		$this->setPDFVersion();
		$this->tcpdflink = true;
		$this->encoding = $encoding;
		$this->HREF = array();
		$this->getFontsList();
		$this->fgcolor = array('R' => 0, 'G' => 0, 'B' => 0);
		$this->strokecolor = array('R' => 0, 'G' => 0, 'B' => 0);
		$this->bgcolor = array('R' => 255, 'G' => 255, 'B' => 255);
		$this->extgstates = array();
		$this->setTextShadow();
		// signature
		$this->sign = false;
		$this->tsa_timestamp = false;
		$this->tsa_data = array();
		$this->signature_appearance = array('page' => 1, 'rect' => '0 0 0 0', 'name' => 'Signature');
		$this->empty_signature_appearance = array();
		// user's rights
		$this->ur['enabled'] = false;
		$this->ur['document'] = '/FullSave';
		$this->ur['annots'] = '/Create/Delete/Modify/Copy/Import/Export';
		$this->ur['form'] = '/Add/Delete/FillIn/Import/Export/SubmitStandalone/SpawnTemplate';
		$this->ur['signature'] = '/Modify';
		$this->ur['ef'] = '/Create/Delete/Modify/Import';
		$this->ur['formex'] = '';
		// set default JPEG quality
		$this->jpeg_quality = 75;
		// initialize some settings
		TCPDF_FONTS::utf8Bidi(array(), '', false, $this->isunicode, $this->CurrentFont);
		// set default font
		$this->SetFont($this->FontFamily, $this->FontStyle, $this->FontSizePt);
		$this->setHeaderFont(array($this->FontFamily, $this->FontStyle, $this->FontSizePt));
		$this->setFooterFont(array($this->FontFamily, $this->FontStyle, $this->FontSizePt));
		// check if PCRE Unicode support is enabled
		if ($this->isunicode AND (@preg_match('/\pL/u', 'a') == 1)) {
			// PCRE unicode support is turned ON
			// \s     : any whitespace character
			// \p{Z}  : any separator
			// \p{Lo} : Unicode letter or ideograph that does not have lowercase and uppercase variants. Is used to chunk chinese words.
			// \xa0   : Unicode Character 'NO-BREAK SPACE' (U+00A0)
			//$this->setSpacesRE('/(?!\xa0)[\s\p{Z}\p{Lo}]/u');
			$this->setSpacesRE('/(?!\xa0)[\s\p{Z}]/u');
		} else {
			// PCRE unicode support is turned OFF
			$this->setSpacesRE('/[^\S\xa0]/');
		}
		$this->default_form_prop = array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 255), 'strokeColor'=>array(128, 128, 128));
		// set document creation and modification timestamp
		$this->doc_creation_timestamp = time();
		$this->doc_modification_timestamp = $this->doc_creation_timestamp;
		// get default graphic vars
		$this->default_graphic_vars = $this->getGraphicVars();
		$this->header_xobj_autoreset = false;
		$this->custom_xmp = '';
		$this->custom_xmp_rdf = '';
		// Call cleanup method after script execution finishes or exit() is called.
		// NOTE: This will not be executed if the process is killed with a SIGTERM or SIGKILL signal.
		register_shutdown_function(array($this, '_destroy'), true);
	}

	/**
	 * Default destructor.
	 * @public
	 * @since 1.53.0.TC016
	 */
	public function __destruct() {
		// cleanup
		$this->_destroy(true);
	}

	/**
	 * Set the units of measure for the document.
	 * @param string $unit User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
	 * @public
	 * @since 3.0.015 (2008-06-06)
	 */
	public function setPageUnit($unit) {
		$unit = strtolower($unit);
		//Set scale factor
		switch ($unit) {
			// points
			case 'px':
			case 'pt': {
				$this->k = 1;
				break;
			}
			// millimeters
			case 'mm': {
				$this->k = $this->dpi / 25.4;
				break;
			}
			// centimeters
			case 'cm': {
				$this->k = $this->dpi / 2.54;
				break;
			}
			// inches
			case 'in': {
				$this->k = $this->dpi;
				break;
			}
			// unsupported unit
			default : {
				$this->Error('Incorrect unit: '.$unit);
				break;
			}
		}
		$this->pdfunit = $unit;
		if (isset($this->CurOrientation)) {
			$this->setPageOrientation($this->CurOrientation);
		}
	}

	/**
	 * Change the format of the current page
	 * @param mixed $format The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() documentation or an array of two numbers (width, height) or an array containing the following measures and options:<ul>
	 * <li>['format'] = page format name (one of the above);</li>
	 * <li>['Rotate'] : The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.</li>
	 * <li>['PZ'] : The page's preferred zoom (magnification) factor.</li>
	 * <li>['MediaBox'] : the boundaries of the physical medium on which the page shall be displayed or printed:</li>
	 * <li>['MediaBox']['llx'] : lower-left x coordinate</li>
	 * <li>['MediaBox']['lly'] : lower-left y coordinate</li>
	 * <li>['MediaBox']['urx'] : upper-right x coordinate</li>
	 * <li>['MediaBox']['ury'] : upper-right y coordinate</li>
	 * <li>['CropBox'] : the visible region of default user space:</li>
	 * <li>['CropBox']['llx'] : lower-left x coordinate</li>
	 * <li>['CropBox']['lly'] : lower-left y coordinate</li>
	 * <li>['CropBox']['urx'] : upper-right x coordinate</li>
	 * <li>['CropBox']['ury'] : upper-right y coordinate</li>
	 * <li>['BleedBox'] : the region to which the contents of the page shall be clipped when output in a production environment:</li>
	 * <li>['BleedBox']['llx'] : lower-left x coordinate</li>
	 * <li>['BleedBox']['lly'] : lower-left y coordinate</li>
	 * <li>['BleedBox']['urx'] : upper-right x coordinate</li>
	 * <li>['BleedBox']['ury'] : upper-right y coordinate</li>
	 * <li>['TrimBox'] : the intended dimensions of the finished page after trimming:</li>
	 * <li>['TrimBox']['llx'] : lower-left x coordinate</li>
	 * <li>['TrimBox']['lly'] : lower-left y coordinate</li>
	 * <li>['TrimBox']['urx'] : upper-right x coordinate</li>
	 * <li>['TrimBox']['ury'] : upper-right y coordinate</li>
	 * <li>['ArtBox'] : the extent of the page's meaningful content:</li>
	 * <li>['ArtBox']['llx'] : lower-left x coordinate</li>
	 * <li>['ArtBox']['lly'] : lower-left y coordinate</li>
	 * <li>['ArtBox']['urx'] : upper-right x coordinate</li>
	 * <li>['ArtBox']['ury'] : upper-right y coordinate</li>
	 * <li>['BoxColorInfo'] :specify the colours and other visual characteristics that should be used in displaying guidelines on the screen for each of the possible page boundaries other than the MediaBox:</li>
	 * <li>['BoxColorInfo'][BOXTYPE]['C'] : an array of three numbers in the range 0-255, representing the components in the DeviceRGB colour space.</li>
	 * <li>['BoxColorInfo'][BOXTYPE]['W'] : the guideline width in default user units</li>
	 * <li>['BoxColorInfo'][BOXTYPE]['S'] : the guideline style: S = Solid; D = Dashed</li>
	 * <li>['BoxColorInfo'][BOXTYPE]['D'] : dash array defining a pattern of dashes and gaps to be used in drawing dashed guidelines</li>
	 * <li>['trans'] : the style and duration of the visual transition to use when moving from another page to the given page during a presentation</li>
	 * <li>['trans']['Dur'] : The page's display duration (also called its advance timing): the maximum length of time, in seconds, that the page shall be displayed during presentations before the viewer application shall automatically advance to the next page.</li>
	 * <li>['trans']['S'] : transition style : Split, Blinds, Box, Wipe, Dissolve, Glitter, R, Fly, Push, Cover, Uncover, Fade</li>
	 * <li>['trans']['D'] : The duration of the transition effect, in seconds.</li>
	 * <li>['trans']['Dm'] : (Split and Blinds transition styles only) The dimension in which the specified transition effect shall occur: H = Horizontal, V = Vertical. Default value: H.</li>
	 * <li>['trans']['M'] : (Split, Box and Fly transition styles only) The direction of motion for the specified transition effect: I = Inward from the edges of the page, O = Outward from the center of the pageDefault value: I.</li>
	 * <li>['trans']['Di'] : (Wipe, Glitter, Fly, Cover, Uncover and Push transition styles only) The direction in which the specified transition effect shall moves, expressed in degrees counterclockwise starting from a left-to-right direction. If the value is a number, it shall be one of: 0 = Left to right, 90 = Bottom to top (Wipe only), 180 = Right to left (Wipe only), 270 = Top to bottom, 315 = Top-left to bottom-right (Glitter only). If the value is a name, it shall be None, which is relevant only for the Fly transition when the value of SS is not 1.0. Default value: 0.</li>
	 * <li>['trans']['SS'] : (Fly transition style only) The starting or ending scale at which the changes shall be drawn. If M specifies an inward transition, the scale of the changes drawn shall progress from SS to 1.0 over the course of the transition. If M specifies an outward transition, the scale of the changes drawn shall progress from 1.0 to SS over the course of the transition. Default: 1.0.</li>
	 * <li>['trans']['B'] : (Fly transition style only) If true, the area that shall be flown in is rectangular and opaque. Default: false.</li>
	 * </ul>
	 * @param string $orientation page orientation. Possible values are (case insensitive):<ul>
	 * <li>P or Portrait (default)</li>
	 * <li>L or Landscape</li>
	 * <li>'' (empty string) for automatic orientation</li>
	 * </ul>
	 * @protected
	 * @since 3.0.015 (2008-06-06)
	 * @see getPageSizeFromFormat()
	 */
	protected function setPageFormat($format, $orientation='P') {
		if (!empty($format) AND isset($this->pagedim[$this->page])) {
			// remove inherited values
			unset($this->pagedim[$this->page]);
		}
		if (is_string($format)) {
			// get page measures from format name
			$pf = TCPDF_STATIC::getPageSizeFromFormat($format);
			$this->fwPt = $pf[0];
			$this->fhPt = $pf[1];
		} else {
			// the boundaries of the physical medium on which the page shall be displayed or printed
			if (isset($format['MediaBox'])) {
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'MediaBox', $format['MediaBox']['llx'], $format['MediaBox']['lly'], $format['MediaBox']['urx'], $format['MediaBox']['ury'], false, $this->k, $this->pagedim);
				$this->fwPt = (($format['MediaBox']['urx'] - $format['MediaBox']['llx']) * $this->k);
				$this->fhPt = (($format['MediaBox']['ury'] - $format['MediaBox']['lly']) * $this->k);
			} else {
				if (isset($format[0]) AND is_numeric($format[0]) AND isset($format[1]) AND is_numeric($format[1])) {
					$pf = array(($format[0] * $this->k), ($format[1] * $this->k));
				} else {
					if (!isset($format['format'])) {
						// default value
						$format['format'] = 'A4';
					}
					$pf = TCPDF_STATIC::getPageSizeFromFormat($format['format']);
				}
				$this->fwPt = $pf[0];
				$this->fhPt = $pf[1];
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'MediaBox', 0, 0, $this->fwPt, $this->fhPt, true, $this->k, $this->pagedim);
			}
			// the visible region of default user space
			if (isset($format['CropBox'])) {
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'CropBox', $format['CropBox']['llx'], $format['CropBox']['lly'], $format['CropBox']['urx'], $format['CropBox']['ury'], false, $this->k, $this->pagedim);
			}
			// the region to which the contents of the page shall be clipped when output in a production environment
			if (isset($format['BleedBox'])) {
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'BleedBox', $format['BleedBox']['llx'], $format['BleedBox']['lly'], $format['BleedBox']['urx'], $format['BleedBox']['ury'], false, $this->k, $this->pagedim);
			}
			// the intended dimensions of the finished page after trimming
			if (isset($format['TrimBox'])) {
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'TrimBox', $format['TrimBox']['llx'], $format['TrimBox']['lly'], $format['TrimBox']['urx'], $format['TrimBox']['ury'], false, $this->k, $this->pagedim);
			}
			// the page's meaningful content (including potential white space)
			if (isset($format['ArtBox'])) {
				$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'ArtBox', $format['ArtBox']['llx'], $format['ArtBox']['lly'], $format['ArtBox']['urx'], $format['ArtBox']['ury'], false, $this->k, $this->pagedim);
			}
			// specify the colours and other visual characteristics that should be used in displaying guidelines on the screen for the various page boundaries
			if (isset($format['BoxColorInfo'])) {
				$this->pagedim[$this->page]['BoxColorInfo'] = $format['BoxColorInfo'];
			}
			if (isset($format['Rotate']) AND (($format['Rotate'] % 90) == 0)) {
				// The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.
				$this->pagedim[$this->page]['Rotate'] = intval($format['Rotate']);
			}
			if (isset($format['PZ'])) {
				// The page's preferred zoom (magnification) factor
				$this->pagedim[$this->page]['PZ'] = floatval($format['PZ']);
			}
			if (isset($format['trans'])) {
				// The style and duration of the visual transition to use when moving from another page to the given page during a presentation
				if (isset($format['trans']['Dur'])) {
					// The page's display duration
					$this->pagedim[$this->page]['trans']['Dur'] = floatval($format['trans']['Dur']);
				}
				$stansition_styles = array('Split', 'Blinds', 'Box', 'Wipe', 'Dissolve', 'Glitter', 'R', 'Fly', 'Push', 'Cover', 'Uncover', 'Fade');
				if (isset($format['trans']['S']) AND in_array($format['trans']['S'], $stansition_styles)) {
					// The transition style that shall be used when moving to this page from another during a presentation
					$this->pagedim[$this->page]['trans']['S'] = $format['trans']['S'];
					$valid_effect = array('Split', 'Blinds');
					$valid_vals = array('H', 'V');
					if (isset($format['trans']['Dm']) AND in_array($format['trans']['S'], $valid_effect) AND in_array($format['trans']['Dm'], $valid_vals)) {
						$this->pagedim[$this->page]['trans']['Dm'] = $format['trans']['Dm'];
					}
					$valid_effect = array('Split', 'Box', 'Fly');
					$valid_vals = array('I', 'O');
					if (isset($format['trans']['M']) AND in_array($format['trans']['S'], $valid_effect) AND in_array($format['trans']['M'], $valid_vals)) {
						$this->pagedim[$this->page]['trans']['M'] = $format['trans']['M'];
					}
					$valid_effect = array('Wipe', 'Glitter', 'Fly', 'Cover', 'Uncover', 'Push');
					if (isset($format['trans']['Di']) AND in_array($format['trans']['S'], $valid_effect)) {
						if (((($format['trans']['Di'] == 90) OR ($format['trans']['Di'] == 180)) AND ($format['trans']['S'] == 'Wipe'))
							OR (($format['trans']['Di'] == 315) AND ($format['trans']['S'] == 'Glitter'))
							OR (($format['trans']['Di'] == 0) OR ($format['trans']['Di'] == 270))) {
							$this->pagedim[$this->page]['trans']['Di'] = intval($format['trans']['Di']);
						}
					}
					if (isset($format['trans']['SS']) AND ($format['trans']['S'] == 'Fly')) {
						$this->pagedim[$this->page]['trans']['SS'] = floatval($format['trans']['SS']);
					}
					if (isset($format['trans']['B']) AND ($format['trans']['B'] === true) AND ($format['trans']['S'] == 'Fly')) {
						$this->pagedim[$this->page]['trans']['B'] = 'true';
					}
				} else {
					$this->pagedim[$this->page]['trans']['S'] = 'R';
				}
				if (isset($format['trans']['D'])) {
					// The duration of the transition effect, in seconds
					$this->pagedim[$this->page]['trans']['D'] = floatval($format['trans']['D']);
				} else {
					$this->pagedim[$this->page]['trans']['D'] = 1;
				}
			}
		}
		$this->setPageOrientation($orientation);
	}

	/**
	 * Set page orientation.
	 * @param string $orientation page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
	 * @param boolean $autopagebreak Boolean indicating if auto-page-break mode should be on or off.
	 * @param float $bottommargin bottom margin of the page.
	 * @public
	 * @since 3.0.015 (2008-06-06)
	 */
	public function setPageOrientation($orientation, $autopagebreak='', $bottommargin='') {
		if (!isset($this->pagedim[$this->page]['MediaBox'])) {
			// the boundaries of the physical medium on which the page shall be displayed or printed
			$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'MediaBox', 0, 0, $this->fwPt, $this->fhPt, true, $this->k, $this->pagedim);
		}
		if (!isset($this->pagedim[$this->page]['CropBox'])) {
			// the visible region of default user space
			$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'CropBox', $this->pagedim[$this->page]['MediaBox']['llx'], $this->pagedim[$this->page]['MediaBox']['lly'], $this->pagedim[$this->page]['MediaBox']['urx'], $this->pagedim[$this->page]['MediaBox']['ury'], true, $this->k, $this->pagedim);
		}
		if (!isset($this->pagedim[$this->page]['BleedBox'])) {
			// the region to which the contents of the page shall be clipped when output in a production environment
			$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'BleedBox', $this->pagedim[$this->page]['CropBox']['llx'], $this->pagedim[$this->page]['CropBox']['lly'], $this->pagedim[$this->page]['CropBox']['urx'], $this->pagedim[$this->page]['CropBox']['ury'], true, $this->k, $this->pagedim);
		}
		if (!isset($this->pagedim[$this->page]['TrimBox'])) {
			// the intended dimensions of the finished page after trimming
			$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'TrimBox', $this->pagedim[$this->page]['CropBox']['llx'], $this->pagedim[$this->page]['CropBox']['lly'], $this->pagedim[$this->page]['CropBox']['urx'], $this->pagedim[$this->page]['CropBox']['ury'], true, $this->k, $this->pagedim);
		}
		if (!isset($this->pagedim[$this->page]['ArtBox'])) {
			// the page's meaningful content (including potential white space)
			$this->pagedim = TCPDF_STATIC::setPageBoxes($this->page, 'ArtBox', $this->pagedim[$this->page]['CropBox']['llx'], $this->pagedim[$this->page]['CropBox']['lly'], $this->pagedim[$this->page]['CropBox']['urx'], $this->pagedim[$this->page]['CropBox']['ury'], true, $this->k, $this->pagedim);
		}
		if (!isset($this->pagedim[$this->page]['Rotate'])) {
			// The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.
			$this->pagedim[$this->page]['Rotate'] = 0;
		}
		if (!isset($this->pagedim[$this->page]['PZ'])) {
			// The page's preferred zoom (magnification) factor
			$this->pagedim[$this->page]['PZ'] = 1;
		}
		if ($this->fwPt > $this->fhPt) {
			// landscape
			$default_orientation = 'L';
		} else {
			// portrait
			$default_orientation = 'P';
		}
		$valid_orientations = array('P', 'L');
		if (empty($orientation)) {
			$orientation = $default_orientation;
		} else {
			$orientation = strtoupper($orientation[0]);
		}
		if (in_array($orientation, $valid_orientations) AND ($orientation != $default_orientation)) {
			$this->CurOrientation = $orientation;
			$this->wPt = $this->fhPt;
			$this->hPt = $this->fwPt;
		} else {
			$this->CurOrientation = $default_orientation;
			$this->wPt = $this->fwPt;
			$this->hPt = $this->fhPt;
		}
		if ((abs($this->pagedim[$this->page]['MediaBox']['urx'] - $this->hPt) < $this->feps) AND (abs($this->pagedim[$this->page]['MediaBox']['ury'] - $this->wPt) < $this->feps)){
			// swap X and Y coordinates (change page orientation)
			$this->pagedim = TCPDF_STATIC::swapPageBoxCoordinates($this->page, $this->pagedim);
		}
		$this->w = ($this->wPt / $this->k);
		$this->h = ($this->hPt / $this->k);
		if (TCPDF_STATIC::empty_string($autopagebreak)) {
			if (isset($this->AutoPageBreak)) {
				$autopagebreak = $this->AutoPageBreak;
			} else {
				$autopagebreak = true;
			}
		}
		if (TCPDF_STATIC::empty_string($bottommargin)) {
			if (isset($this->bMargin)) {
				$bottommargin = $this->bMargin;
			} else {
				// default value = 2 cm
				$bottommargin = 2 * 28.35 / $this->k;
			}
		}
		$this->SetAutoPageBreak($autopagebreak, $bottommargin);
		// store page dimensions
		$this->pagedim[$this->page]['w'] = $this->wPt;
		$this->pagedim[$this->page]['h'] = $this->hPt;
		$this->pagedim[$this->page]['wk'] = $this->w;
		$this->pagedim[$this->page]['hk'] = $this->h;
		$this->pagedim[$this->page]['tm'] = $this->tMargin;
		$this->pagedim[$this->page]['bm'] = $bottommargin;
		$this->pagedim[$this->page]['lm'] = $this->lMargin;
		$this->pagedim[$this->page]['rm'] = $this->rMargin;
		$this->pagedim[$this->page]['pb'] = $autopagebreak;
		$this->pagedim[$this->page]['or'] = $this->CurOrientation;
		$this->pagedim[$this->page]['olm'] = $this->original_lMargin;
		$this->pagedim[$this->page]['orm'] = $this->original_rMargin;
	}

	/**
	 * Set regular expression to detect withespaces or word separators.
	 * The pattern delimiter must be the forward-slash character "/".
	 * Some example patterns are:
	 * <pre>
	 * Non-Unicode or missing PCRE unicode support: "/[^\S\xa0]/"
	 * Unicode and PCRE unicode support: "/(?!\xa0)[\s\p{Z}]/u"
	 * Unicode and PCRE unicode support in Chinese mode: "/(?!\xa0)[\s\p{Z}\p{Lo}]/u"
	 * if PCRE unicode support is turned ON ("\P" is the negate class of "\p"):
	 *      \s     : any whitespace character
	 *      \p{Z}  : any separator
	 *      \p{Lo} : Unicode letter or ideograph that does not have lowercase and uppercase variants. Is used to chunk chinese words.
	 *      \xa0   : Unicode Character 'NO-BREAK SPACE' (U+00A0)
	 * </pre>
	 * @param string $re regular expression (leave empty for default).
	 * @public
	 * @since 4.6.016 (2009-06-15)
	 */
	public function setSpacesRE($re='/[^\S\xa0]/') {
		$this->re_spaces = $re;
		$re_parts = explode('/', $re);
		// get pattern parts
		$this->re_space = array();
		if (isset($re_parts[1]) AND !empty($re_parts[1])) {
			$this->re_space['p'] = $re_parts[1];
		} else {
			$this->re_space['p'] = '[\s]';
		}
		// set pattern modifiers
		if (isset($re_parts[2]) AND !empty($re_parts[2])) {
			$this->re_space['m'] = $re_parts[2];
		} else {
			$this->re_space['m'] = '';
		}
	}

	/**
	 * Enable or disable Right-To-Left language mode
	 * @param boolean $enable if true enable Right-To-Left language mode.
	 * @param boolean $resetx if true reset the X position on direction change.
	 * @public
	 * @since 2.0.000 (2008-01-03)
	 */
	public function setRTL($enable, $resetx=true) {
		$enable = $enable ? true : false;
		$resetx = ($resetx AND ($enable != $this->rtl));
		$this->rtl = $enable;
		$this->tmprtl = false;
		if ($resetx) {
			$this->Ln(0);
		}
	}

	/**
	 * Return the RTL status
	 * @return bool
	 * @public
	 * @since 4.0.012 (2008-07-24)
	 */
	public function getRTL() {
		return $this->rtl;
	}

	/**
	 * Force temporary RTL language direction
	 * @param mixed $mode can be false, 'L' for LTR or 'R' for RTL
	 * @public
	 * @since 2.1.000 (2008-01-09)
	 */
	public function setTempRTL($mode) {
		$newmode = false;
		switch (strtoupper($mode)) {
			case 'LTR':
			case 'L': {
				if ($this->rtl) {
					$newmode = 'L';
				}
				break;
			}
			case 'RTL':
			case 'R': {
				if (!$this->rtl) {
					$newmode = 'R';
				}
				break;
			}
			case false:
			default: {
				$newmode = false;
				break;
			}
		}
		$this->tmprtl = $newmode;
	}

	/**
	 * Return the current temporary RTL status
	 * @return bool
	 * @public
	 * @since 4.8.014 (2009-11-04)
	 */
	public function isRTLTextDir() {
		return ($this->rtl OR ($this->tmprtl == 'R'));
	}

	/**
	 * Set the last cell height.
	 * @param float $h cell height.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.53.0.TC034
	 */
	public function setLastH($h) {
		$this->lasth = $h;
	}

	/**
	 * Return the cell height
	 * @param int $fontsize Font size in internal units
	 * @param boolean $padding If true add cell padding
	 * @public
	 */
	public function getCellHeight($fontsize, $padding=TRUE) {
		$height = ($fontsize * $this->cell_height_ratio);
		if ($padding) {
			$height += ($this->cell_padding['T'] + $this->cell_padding['B']);
		}
		return round($height, 6);
	}

	/**
	 * Reset the last cell height.
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 */
	public function resetLastH() {
		$this->lasth = $this->getCellHeight($this->FontSize);
	}

	/**
	 * Get the last cell height.
	 * @return float last cell height
	 * @public
	 * @since 4.0.017 (2008-08-05)
	 */
	public function getLastH() {
		return $this->lasth;
	}

	/**
	 * Set the adjusting factor to convert pixels to user units.
	 * @param float $scale adjusting factor to convert pixels to user units.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 */
	public function setImageScale($scale) {
		$this->imgscale = $scale;
	}

	/**
	 * Returns the adjusting factor to convert pixels to user units.
	 * @return float adjusting factor to convert pixels to user units.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 */
	public function getImageScale() {
		return $this->imgscale;
	}

	/**
	 * Returns an array of page dimensions:
	 * <ul><li>$this->pagedim[$this->page]['w'] = page width in points</li><li>$this->pagedim[$this->page]['h'] = height in points</li><li>$this->pagedim[$this->page]['wk'] = page width in user units</li><li>$this->pagedim[$this->page]['hk'] = page height in user units</li><li>$this->pagedim[$this->page]['tm'] = top margin</li><li>$this->pagedim[$this->page]['bm'] = bottom margin</li><li>$this->pagedim[$this->page]['lm'] = left margin</li><li>$this->pagedim[$this->page]['rm'] = right margin</li><li>$this->pagedim[$this->page]['pb'] = auto page break</li><li>$this->pagedim[$this->page]['or'] = page orientation</li><li>$this->pagedim[$this->page]['olm'] = original left margin</li><li>$this->pagedim[$this->page]['orm'] = original right margin</li><li>$this->pagedim[$this->page]['Rotate'] = The number of degrees by which the page shall be rotated clockwise when displayed or printed. The value shall be a multiple of 90.</li><li>$this->pagedim[$this->page]['PZ'] = The page's preferred zoom (magnification) factor.</li><li>$this->pagedim[$this->page]['trans'] : the style and duration of the visual transition to use when moving from another page to the given page during a presentation<ul><li>$this->pagedim[$this->page]['trans']['Dur'] = The page's display duration (also called its advance timing): the maximum length of time, in seconds, that the page shall be displayed during presentations before the viewer application shall automatically advance to the next page.</li><li>$this->pagedim[$this->page]['trans']['S'] = transition style : Split, Blinds, Box, Wipe, Dissolve, Glitter, R, Fly, Push, Cover, Uncover, Fade</li><li>$this->pagedim[$this->page]['trans']['D'] = The duration of the transition effect, in seconds.</li><li>$this->pagedim[$this->page]['trans']['Dm'] = (Split and Blinds transition styles only) The dimension in which the specified transition effect shall occur: H = Horizontal, V = Vertical. Default value: H.</li><li>$this->pagedim[$this->page]['trans']['M'] = (Split, Box and Fly transition styles only) The direction of motion for the specified transition effect: I = Inward from the edges of the page, O = Outward from the center of the pageDefault value: I.</li><li>$this->pagedim[$this->page]['trans']['Di'] = (Wipe, Glitter, Fly, Cover, Uncover and Push transition styles only) The direction in which the specified transition effect shall moves, expressed in degrees counterclockwise starting from a left-to-right direction. If the value is a number, it shall be one of: 0 = Left to right, 90 = Bottom to top (Wipe only), 180 = Right to left (Wipe only), 270 = Top to bottom, 315 = Top-left to bottom-right (Glitter only). If the value is a name, it shall be None, which is relevant only for the Fly transition when the value of SS is not 1.0. Default value: 0.</li><li>$this->pagedim[$this->page]['trans']['SS'] = (Fly transition style only) The starting or ending scale at which the changes shall be drawn. If M specifies an inward transition, the scale of the changes drawn shall progress from SS to 1.0 over the course of the transition. If M specifies an outward transition, the scale of the changes drawn shall progress from 1.0 to SS over the course of the transition. Default: 1.0. </li><li>$this->pagedim[$this->page]['trans']['B'] = (Fly transition style only) If true, the area that shall be flown in is rectangular and opaque. Default: false.</li></ul></li><li>$this->pagedim[$this->page]['MediaBox'] : the boundaries of the physical medium on which the page shall be displayed or printed<ul><li>$this->pagedim[$this->page]['MediaBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['MediaBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['CropBox'] : the visible region of default user space<ul><li>$this->pagedim[$this->page]['CropBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['CropBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['BleedBox'] : the region to which the contents of the page shall be clipped when output in a production environment<ul><li>$this->pagedim[$this->page]['BleedBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['BleedBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['TrimBox'] : the intended dimensions of the finished page after trimming<ul><li>$this->pagedim[$this->page]['TrimBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['TrimBox']['ury'] = upper-right y coordinate in points</li></ul></li><li>$this->pagedim[$this->page]['ArtBox'] : the extent of the page's meaningful content<ul><li>$this->pagedim[$this->page]['ArtBox']['llx'] = lower-left x coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['lly'] = lower-left y coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['urx'] = upper-right x coordinate in points</li><li>$this->pagedim[$this->page]['ArtBox']['ury'] = upper-right y coordinate in points</li></ul></li></ul>
	 * @param int $pagenum page number (empty = current page)
	 * @return array of page dimensions.
	 * @author Nicola Asuni
	 * @public
	 * @since 4.5.027 (2009-03-16)
	 */
	public function getPageDimensions($pagenum='') {
		if (empty($pagenum)) {
			$pagenum = $this->page;
		}
		return $this->pagedim[$pagenum];
	}

	/**
	 * Returns the page width in units.
	 * @param int $pagenum page number (empty = current page)
	 * @return int page width.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 * @see getPageDimensions()
	 */
	public function getPageWidth($pagenum='') {
		if (empty($pagenum)) {
			return $this->w;
		}
		return $this->pagedim[$pagenum]['w'];
	}

	/**
	 * Returns the page height in units.
	 * @param int $pagenum page number (empty = current page)
	 * @return int page height.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 * @see getPageDimensions()
	 */
	public function getPageHeight($pagenum='') {
		if (empty($pagenum)) {
			return $this->h;
		}
		return $this->pagedim[$pagenum]['h'];
	}

	/**
	 * Returns the page break margin.
	 * @param int $pagenum page number (empty = current page)
	 * @return int page break margin.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 * @see getPageDimensions()
	 */
	public function getBreakMargin($pagenum='') {
		if (empty($pagenum)) {
			return $this->bMargin;
		}
		return $this->pagedim[$pagenum]['bm'];
	}

	/**
	 * Returns the scale factor (number of points in user unit).
	 * @return int scale factor.
	 * @author Nicola Asuni
	 * @public
	 * @since 1.5.2
	 */
	public function getScaleFactor() {
		return $this->k;
	}

	/**
	 * Defines the left, top and right margins.
	 * @param float $left Left margin.
	 * @param float $top Top margin.
	 * @param float $right Right margin. Default value is the left one.
	 * @param boolean $keepmargins if true overwrites the default page margins
	 * @public
	 * @since 1.0
	 * @see SetLeftMargin(), SetTopMargin(), SetRightMargin(), SetAutoPageBreak()
	 */
	public function SetMargins($left, $top, $right=-1, $keepmargins=false) {
		//Set left, top and right margins
		$this->lMargin = $left;
		$this->tMargin = $top;
		if ($right == -1) {
			$right = $left;
		}
		$this->rMargin = $right;
		if ($keepmargins) {
			// overwrite original values
			$this->original_lMargin = $this->lMargin;
			$this->original_rMargin = $this->rMargin;
		}
	}

	/**
	 * Defines the left margin. The method can be called before creating the first page. If the current abscissa gets out of page, it is brought back to the margin.
	 * @param float $margin The margin.
	 * @public
	 * @since 1.4
	 * @see SetTopMargin(), SetRightMargin(), SetAutoPageBreak(), SetMargins()
	 */
	public function SetLeftMargin($margin) {
		//Set left margin
		$this->lMargin = $margin;
		if (($this->page > 0) AND ($this->x < $margin)) {
			$this->x = $margin;
		}
	}

	/**
	 * Defines the top margin. The method can be called before creating the first page.
	 * @param float $margin The margin.
	 * @public
	 * @since 1.5
	 * @see SetLeftMargin(), SetRightMargin(), SetAutoPageBreak(), SetMargins()
	 */
	public function SetTopMargin($margin) {
		//Set top margin
		$this->tMargin = $margin;
		if (($this->page > 0) AND ($this->y < $margin)) {
			$this->y = $margin;
		}
	}

	/**
	 * Defines the right margin. The method can be called before creating the first page.
	 * @param float $margin The margin.
	 * @public
	 * @since 1.5
	 * @see SetLeftMargin(), SetTopMargin(), SetAutoPageBreak(), SetMargins()
	 */
	public function SetRightMargin($margin) {
		$this->rMargin = $margin;
		if (($this->page > 0) AND ($this->x > ($this->w - $margin))) {
			$this->x = $this->w - $margin;
		}
	}

	/**
	 * Set the same internal Cell padding for top, right, bottom, left-
	 * @param float $pad internal padding.
	 * @public
	 * @since 2.1.000 (2008-01-09)
	 * @see getCellPaddings(), setCellPaddings()
	 */
	public function SetCellPadding($pad) {
		if ($pad >= 0) {
			$this->cell_padding['L'] = $pad;
			$this->cell_padding['T'] = $pad;
			$this->cell_padding['R'] = $pad;
			$this->cell_padding['B'] = $pad;
		}
	}

	/**
	 * Set the internal Cell paddings.
	 * @param float $left left padding
	 * @param float $top top padding
	 * @param float $right right padding
	 * @param float $bottom bottom padding
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 * @see getCellPaddings(), SetCellPadding()
	 */
	public function setCellPaddings($left='', $top='', $right='', $bottom='') {
		if (($left !== '') AND ($left >= 0)) {
			$this->cell_padding['L'] = $left;
		}
		if (($top !== '') AND ($top >= 0)) {
			$this->cell_padding['T'] = $top;
		}
		if (($right !== '') AND ($right >= 0)) {
			$this->cell_padding['R'] = $right;
		}
		if (($bottom !== '') AND ($bottom >= 0)) {
			$this->cell_padding['B'] = $bottom;
		}
	}

	/**
	 * Get the internal Cell padding array.
	 * @return array of padding values
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 * @see setCellPaddings(), SetCellPadding()
	 */
	public function getCellPaddings() {
		return $this->cell_padding;
	}

	/**
	 * Set the internal Cell margins.
	 * @param float $left left margin
	 * @param float $top top margin
	 * @param float $right right margin
	 * @param float $bottom bottom margin
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 * @see getCellMargins()
	 */
	public function setCellMargins($left='', $top='', $right='', $bottom='') {
		if (($left !== '') AND ($left >= 0)) {
			$this->cell_margin['L'] = $left;
		}
		if (($top !== '') AND ($top >= 0)) {
			$this->cell_margin['T'] = $top;
		}
		if (($right !== '') AND ($right >= 0)) {
			$this->cell_margin['R'] = $right;
		}
		if (($bottom !== '') AND ($bottom >= 0)) {
			$this->cell_margin['B'] = $bottom;
		}
	}

	/**
	 * Get the internal Cell margin array.
	 * @return array of margin values
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 * @see setCellMargins()
	 */
	public function getCellMargins() {
		return $this->cell_margin;
	}

	/**
	 * Adjust the internal Cell padding array to take account of the line width.
	 * @param string|array|int $brd Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
	 * @return void|array array of adjustments
	 * @public
	 * @since 5.9.000 (2010-10-03)
	 */
	protected function adjustCellPadding($brd=0) {
		if (empty($brd)) {
			return;
		}
		if (is_string($brd)) {
			// convert string to array
			$slen = strlen($brd);
			$newbrd = array();
			for ($i = 0; $i < $slen; ++$i) {
				$newbrd[$brd[$i]] = true;
			}
			$brd = $newbrd;
		} elseif (
			($brd === 1)
			|| ($brd === true)
			|| (is_numeric($brd) && ((int)$brd > 0))
		) {
			$brd = array('LRTB' => true);
		}
		if (!is_array($brd)) {
			return;
		}
		// store current cell padding
		$cp = $this->cell_padding;
		// select border mode
		if (isset($brd['mode'])) {
			$mode = $brd['mode'];
			unset($brd['mode']);
		} else {
			$mode = 'normal';
		}
		// process borders
		foreach ($brd as $border => $style) {
			$line_width = $this->LineWidth;
			if (is_array($style) && isset($style['width'])) {
				// get border width
				$line_width = $style['width'];
			}
			$adj = 0; // line width inside the cell
			switch ($mode) {
				case 'ext': {
					$adj = 0;
					break;
				}
				case 'int': {
					$adj = $line_width;
					break;
				}
				case 'normal':
				default: {
					$adj = ($line_width / 2);
					break;
				}
			}
			// correct internal cell padding if required to avoid overlap between text and lines
			if (
				is_numeric($this->cell_padding['T'])
				&& ($this->cell_padding['T'] < $adj)
				&& (strpos($border, 'T') !== false)
			) {
				$this->cell_padding['T'] = $adj;
			}
			if (
				is_numeric($this->cell_padding['R'])
				&& ($this->cell_padding['R'] < $adj)
				&& (strpos($border, 'R') !== false)
			) {
				$this->cell_padding['R'] = $adj;
			}
			if (
				is_numeric($this->cell_padding['B'])
				&& ($this->cell_padding['B'] < $adj)
				&& (strpos($border, 'B') !== false)
			) {
				$this->cell_padding['B'] = $adj;
			}
			if (
				is_numeric($this->cell_padding['L'])
				&& ($this->cell_padding['L'] < $adj)
				&& (strpos($border, 'L') !== false)
			) {
				$this->cell_padding['L'] = $adj;
			}

		}

		return array(
			'T' => ($this->cell_padding['T'] - $cp['T']),
			'R' => ($this->cell_padding['R'] - $cp['R']),
			'B' => ($this->cell_padding['B'] - $cp['B']),
			'L' => ($this->cell_padding['L'] - $cp['L']),
		);
	}

	/**
	 * Enables or disables the automatic page breaking mode. When enabling, the second parameter is the distance from the bottom of the page that defines the triggering limit. By default, the mode is on and the margin is 2 cm.
	 * @param boolean $auto Boolean indicating if mode should be on or off.
	 * @param float $margin Distance from the bottom of the page.
	 * @public
	 * @since 1.0
	 * @see Cell(), MultiCell(), AcceptPageBreak()
	 */
	public function SetAutoPageBreak($auto, $margin=0) {
		$this->AutoPageBreak = $auto ? true : false;
		$this->bMargin = $margin;
		$this->PageBreakTrigger = $this->h - $margin;
	}

	/**
	 * Return the auto-page-break mode (true or false).
	 * @return bool auto-page-break mode
	 * @public
	 * @since 5.9.088
	 */
	public function getAutoPageBreak() {
		return $this->AutoPageBreak;
	}

	/**
	 * Defines the way the document is to be displayed by the viewer.
	 * @param mixed $zoom The zoom to use. It can be one of the following string values or a number indicating the zooming factor to use. <ul><li>fullpage: displays the entire page on screen </li><li>fullwidth: uses maximum width of window</li><li>real: uses real size (equivalent to 100% zoom)</li><li>default: uses viewer default mode</li></ul>
	 * @param string $layout The page layout. Possible values are:<ul><li>SinglePage Display one page at a time</li><li>OneColumn Display the pages in one column</li><li>TwoColumnLeft Display the pages in two columns, with odd-numbered pages on the left</li><li>TwoColumnRight Display the pages in two columns, with odd-numbered pages on the right</li><li>TwoPageLeft (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the left</li><li>TwoPageRight (PDF 1.5) Display the pages two at a time, with odd-numbered pages on the right</li></ul>
	 * @param string $mode A name object specifying how the document should be displayed when opened:<ul><li>UseNone Neither document outline nor thumbnail images visible</li><li>UseOutlines Document outline visible</li><li>UseThumbs Thumbnail images visible</li><li>FullScreen Full-screen mode, with no menu bar, window controls, or any other window visible</li><li>UseOC (PDF 1.5) Optional content group panel visible</li><li>UseAttachments (PDF 1.6) Attachments panel visible</li></ul>
	 * @public
	 * @since 1.2
	 */
	public function SetDisplayMode($zoom, $layout='SinglePage', $mode='UseNone') {
		if (($zoom == 'fullpage') OR ($zoom == 'fullwidth') OR ($zoom == 'real') OR ($zoom == 'default') OR (!is_string($zoom))) {
			$this->ZoomMode = $zoom;
		} else {
			$this->Error('Incorrect zoom display mode: '.$zoom);
		}
		$this->LayoutMode = TCPDF_STATIC::getPageLayoutMode($layout);
		$this->PageMode = TCPDF_STATIC::getPageMode($mode);
	}

	/**
	 * Activates or deactivates page compression. When activated, the internal representation of each page is compressed, which leads to a compression ratio of about 2 for the resulting document. Compression is on by default.
	 * Note: the Zlib extension is required for this feature. If not present, compression will be turned off.
	 * @param boolean $compress Boolean indicating if compression must be enabled.
	 * @public
	 * @since 1.4
	 */
	public function SetCompression($compress=true) {
		$this->compress = false;
		if (function_exists('gzcompress')) {
			if ($compress) {
				if ( !$this->pdfa_mode) {
					$this->compress = true;
				}
			}
		}
	}

	/**
	 * Set flag to force sRGB_IEC61966-2.1 black scaled ICC color profile for the whole document.
	 * @param boolean $mode If true force sRGB output intent.
	 * @public
	 * @since 5.9.121 (2011-09-28)
	 */
	public function setSRGBmode($mode=false) {
		$this->force_srgb = $mode ? true : false;
	}

	/**
	 * Turn on/off Unicode mode for document information dictionary (meta tags).
	 * This has effect only when unicode mode is set to false.
	 * @param boolean $unicode if true set the meta information in Unicode
	 * @since 5.9.027 (2010-12-01)
	 * @public
	 */
	public function SetDocInfoUnicode($unicode=true) {
		$this->docinfounicode = $unicode ? true : false;
	}

	/**
	 * Defines the title of the document.
	 * @param string $title The title.
	 * @public
	 * @since 1.2
	 * @see SetAuthor(), SetCreator(), SetKeywords(), SetSubject()
	 */
	public function SetTitle($title) {
		$this->title = $title;
	}

	/**
	 * Defines the subject of the document.
	 * @param string $subject The subject.
	 * @public
	 * @since 1.2
	 * @see SetAuthor(), SetCreator(), SetKeywords(), SetTitle()
	 */
	public function SetSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * Defines the author of the document.
	 * @param string $author The name of the author.
	 * @public
	 * @since 1.2
	 * @see SetCreator(), SetKeywords(), SetSubject(), SetTitle()
	 */
	public function SetAuthor($author) {
		$this->author = $author;
	}

	/**
	 * Associates keywords with the document, generally in the form 'keyword1 keyword2 ...'.
	 * @param string $keywords The list of keywords.
	 * @public
	 * @since 1.2
	 * @see SetAuthor(), SetCreator(), SetSubject(), SetTitle()
	 */
	public function SetKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
	 * Defines the creator of the document. This is typically the name of the application that generates the PDF.
	 * @param string $creator The name of the creator.
	 * @public
	 * @since 1.2
	 * @see SetAuthor(), SetKeywords(), SetSubject(), SetTitle()
	 */
	public function SetCreator($creator) {
		$this->creator = $creator;
	}

	/**
	 * Whether to allow local file path in image html tags, when prefixed with file://
	 * 
	 * @param bool $allowLocalFiles true, when local files should be allowed. Otherwise false.
	 * @public
	 * @since 6.4
	 */
	public function SetAllowLocalFiles($allowLocalFiles) {
		$this->allowLocalFiles = (bool) $allowLocalFiles;
	}


	/**
	 * Throw an exception or print an error message and die if the K_TCPDF_PARSER_THROW_EXCEPTION_ERROR constant is set to true.
	 * @param string $msg The error message
	 * @public
	 * @since 1.0
	 */
	public function Error($msg) {
		// unset all class variables
		$this->_destroy(true);
		if (defined('K_TCPDF_THROW_EXCEPTION_ERROR') AND !K_TCPDF_THROW_EXCEPTION_ERROR) {
			die('<strong>TCPDF ERROR: </strong>'.$msg);
		} else {
			throw new Exception('TCPDF ERROR: '.$msg);
		}
	}

	/**
	 * This method begins the generation of the PDF document.
	 * It is not necessary to call it explicitly because AddPage() does it automatically.
	 * Note: no page is created by this method
	 * @public
	 * @since 1.0
	 * @see AddPage(), Close()
	 */
	public function Open() {
		$this->state = 1;
	}

	/**
	 * Terminates the PDF document.
	 * It is not necessary to call this method explicitly because Output() does it automatically.
	 * If the document contains no page, AddPage() is called to prevent from getting an invalid document.
	 * @public
	 * @since 1.0
	 * @see Open(), Output()
	 */
	public function Close() {
		if ($this->state == 3) {
			return;
		}
		if ($this->page == 0) {
			$this->AddPage();
		}
		$this->endLayer();
		if ($this->tcpdflink) {
			// save current graphic settings
			$gvars = $this->getGraphicVars();
			$this->setEqualColumns();
			$this->lastpage(true);
			$this->SetAutoPageBreak(false);
			$this->x = 0;
			$this->y = $this->h - (1 / $this->k);
			$this->lMargin = 0;
			$this->_outSaveGraphicsState();
			$font = defined('PDF_FONT_NAME_MAIN')?PDF_FONT_NAME_MAIN:'helvetica';
			$this->SetFont($font, '', 1);
			$this->setTextRenderingMode(0, false, false);
			$msg = "\x50\x6f\x77\x65\x72\x65\x64\x20\x62\x79\x20\x54\x43\x50\x44\x46\x20\x28\x77\x77\x77\x2e\x74\x63\x70\x64\x66\x2e\x6f\x72\x67\x29";
			$lnk = "\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x74\x63\x70\x64\x66\x2e\x6f\x72\x67";
			$this->Cell(0, 0, $msg, 0, 0, 'L', 0, $lnk, 0, false, 'D', 'B');
			$this->_outRestoreGraphicsState();
			// restore graphic settings
			$this->setGraphicVars($gvars);
		}
		// close page
		$this->endPage();
		// close document
		$this->_enddoc();
		// unset all class variables (except critical ones)
		$this->_destroy(false);
	}

	/**
	 * Move pointer at the specified document page and update page dimensions.
	 * @param int $pnum page number (1 ... numpages)
	 * @param boolean $resetmargins if true reset left, right, top margins and Y position.
	 * @public
	 * @since 2.1.000 (2008-01-07)
	 * @see getPage(), lastpage(), getNumPages()
	 */
	public function setPage($pnum, $resetmargins=false) {
		if (($pnum == $this->page) AND ($this->state == 2)) {
			return;
		}
		if (($pnum > 0) AND ($pnum <= $this->numpages)) {
			$this->state = 2;
			// save current graphic settings
			//$gvars = $this->getGraphicVars();
			$oldpage = $this->page;
			$this->page = $pnum;
			$this->wPt = $this->pagedim[$this->page]['w'];
			$this->hPt = $this->pagedim[$this->page]['h'];
			$this->w = $this->pagedim[$this->page]['wk'];
			$this->h = $this->pagedim[$this->page]['hk'];
			$this->tMargin = $this->pagedim[$this->page]['tm'];
			$this->bMargin = $this->pagedim[$this->page]['bm'];
			$this->original_lMargin = $this->pagedim[$this->page]['olm'];
			$this->original_rMargin = $this->pagedim[$this->page]['orm'];
			$this->AutoPageBreak = $this->pagedim[$this->page]['pb'];
			$this->CurOrientation = $this->pagedim[$this->page]['or'];
			$this->SetAutoPageBreak($this->AutoPageBreak, $this->bMargin);
			// restore graphic settings
			//$this->setGraphicVars($gvars);
			if ($resetmargins) {
				$this->lMargin = $this->pagedim[$this->page]['olm'];
				$this->rMargin = $this->pagedim[$this->page]['orm'];
				$this->SetY($this->tMargin);
			} else {
				// account for booklet mode
				if ($this->pagedim[$this->page]['olm'] != $this->pagedim[$oldpage]['olm']) {
					$deltam = $this->pagedim[$this->page]['olm'] - $this->pagedim[$this->page]['orm'];
					$this->lMargin += $deltam;
					$this->rMargin -= $deltam;
				}
			}
		} else {
			$this->Error('Wrong page number on setPage() function: '.$pnum);
		}
	}

	/**
	 * Reset pointer to the last document page.
	 * @param boolean $resetmargins if true reset left, right, top margins and Y position.
	 * @public
	 * @since 2.0.000 (2008-01-04)
	 * @see setPage(), getPage(), getNumPages()
	 */
	public function lastPage($resetmargins=false) {
		$this->setPage($this->getNumPages(), $resetmargins);
	}

	/**
	 * Get current document page number.
	 * @return int page number
	 * @public
	 * @since 2.1.000 (2008-01-07)
	 * @see setPage(), lastpage(), getNumPages()
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * Get the total number of insered pages.
	 * @return int number of pages
	 * @public
	 * @since 2.1.000 (2008-01-07)
	 * @see setPage(), getPage(), lastpage()
	 */
	public function getNumPages() {
		return $this->numpages;
	}

	/**
	 * Adds a new TOC (Table Of Content) page to the document.
	 * @param string $orientation page orientation.
	 * @param mixed $format The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
	 * @param boolean $keepmargins if true overwrites the default page margins with the current margins
	 * @public
	 * @since 5.0.001 (2010-05-06)
	 * @see AddPage(), startPage(), endPage(), endTOCPage()
	 */
	public function addTOCPage($orientation='', $format='', $keepmargins=false) {
		$this->AddPage($orientation, $format, $keepmargins, true);
	}

	/**
	 * Terminate the current TOC (Table Of Content) page
	 * @public
	 * @since 5.0.001 (2010-05-06)
	 * @see AddPage(), startPage(), endPage(), addTOCPage()
	 */
	public function endTOCPage() {
		$this->endPage(true);
	}

	/**
	 * Adds a new page to the document. If a page is already present, the Footer() method is called first to output the footer (if enabled). Then the page is added, the current position set to the top-left corner according to the left and top margins (or top-right if in RTL mode), and Header() is called to display the header (if enabled).
	 * The origin of the coordinate system is at the top-left corner (or top-right for RTL) and increasing ordinates go downwards.
	 * @param string $orientation page orientation. Possible values are (case insensitive):<ul><li>P or PORTRAIT (default)</li><li>L or LANDSCAPE</li></ul>
	 * @param mixed $format The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
	 * @param boolean $keepmargins if true overwrites the default page margins with the current margins
	 * @param boolean $tocpage if true set the tocpage state to true (the added page will be used to display Table Of Content).
	 * @public
	 * @since 1.0
	 * @see startPage(), endPage(), addTOCPage(), endTOCPage(), getPageSizeFromFormat(), setPageFormat()
	 */
	public function AddPage($orientation='', $format='', $keepmargins=false, $tocpage=false) {
		if ($this->inxobj) {
			// we are inside an XObject template
			return;
		}
		if (!isset($this->original_lMargin) OR $keepmargins) {
			$this->original_lMargin = $this->lMargin;
		}
		if (!isset($this->original_rMargin) OR $keepmargins) {
			$this->original_rMargin = $this->rMargin;
		}
		// terminate previous page
		$this->endPage();
		// start new page
		$this->startPage($orientation, $format, $tocpage);
	}

	/**
	 * Terminate the current page
	 * @param boolean $tocpage if true set the tocpage state to false (end the page used to display Table Of Content).
	 * @public
	 * @since 4.2.010 (2008-11-14)
	 * @see AddPage(), startPage(), addTOCPage(), endTOCPage()
	 */
	public function endPage($tocpage=false) {
		// check if page is already closed
		if (($this->page == 0) OR ($this->numpages > $this->page) OR (!$this->pageopen[$this->page])) {
			return;
		}
		// print page footer
		$this->setFooter();
		// close page
		$this->_endpage();
		// mark page as closed
		$this->pageopen[$this->page] = false;
		if ($tocpage) {
			$this->tocpage = false;
		}
	}

	/**
	 * Starts a new page to the document. The page must be closed using the endPage() function.
	 * The origin of the coordinate system is at the top-left corner and increasing ordinates go downwards.
	 * @param string $orientation page orientation. Possible values are (case insensitive):<ul><li>P or PORTRAIT (default)</li><li>L or LANDSCAPE</li></ul>
	 * @param mixed $format The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
	 * @param boolean $tocpage if true the page is designated to contain the Table-Of-Content.
	 * @since 4.2.010 (2008-11-14)
	 * @see AddPage(), endPage(), addTOCPage(), endTOCPage(), getPageSizeFromFormat(), setPageFormat()
	 * @public
	 */
	public function startPage($orientation='', $format='', $tocpage=false) {
		if ($tocpage) {
			$this->tocpage = true;
		}
		// move page numbers of documents to be attached
		if ($this->tocpage) {
			// move reference to unexistent pages (used for page attachments)
			// adjust outlines
			$tmpoutlines = $this->outlines;
			foreach ($tmpoutlines as $key => $outline) {
				if (!$outline['f'] AND ($outline['p'] > $this->numpages)) {
					$this->outlines[$key]['p'] = ($outline['p'] + 1);
				}
			}
			// adjust dests
			$tmpdests = $this->dests;
			foreach ($tmpdests as $key => $dest) {
				if (!$dest['f'] AND ($dest['p'] > $this->numpages)) {
					$this->dests[$key]['p'] = ($dest['p'] + 1);
				}
			}
			// adjust links
			$tmplinks = $this->links;
			foreach ($tmplinks as $key => $link) {
				if (!$link['f'] AND ($link['p'] > $this->numpages)) {
					$this->links[$key]['p'] = ($link['p'] + 1);
				}
			}
		}
		if ($this->numpages > $this->page) {
			// this page has been already added
			$this->setPage($this->page + 1);
			$this->SetY($this->tMargin);
			return;
		}
		// start a new page
		if ($this->state == 0) {
			$this->Open();
		}
		++$this->numpages;
		$this->swapMargins($this->booklet);
		// save current graphic settings
		$gvars = $this->getGraphicVars();
		// start new page
		$this->_beginpage($orientation, $format);
		// mark page as open
		$this->pageopen[$this->page] = true;
		// restore graphic settings
		$this->setGraphicVars($gvars);
		// mark this point
		$this->setPageMark();
		// print page header
		$this->setHeader();
		// restore graphic settings
		$this->setGraphicVars($gvars);
		// mark this point
		$this->setPageMark();
		// print table header (if any)
		$this->setTableHeader();
		// set mark for empty page check
		$this->emptypagemrk[$this->page]= $this->pagelen[$this->page];
	}

	/**
	 * Set start-writing mark on current page stream used to put borders and fills.
	 * Borders and fills are always created after content and inserted on the position marked by this method.
	 * This function must be called after calling Image() function for a background image.
	 * Background images must be always inserted before calling Multicell() or WriteHTMLCell() or WriteHTML() functions.
	 * @public
	 * @since 4.0.016 (2008-07-30)
	 */
	public function setPageMark() {
		$this->intmrk[$this->page] = $this->pagelen[$this->page];
		$this->bordermrk[$this->page] = $this->intmrk[$this->page];
		$this->setContentMark();
	}

	/**
	 * Set start-writing mark on selected page.
	 * Borders and fills are always created after content and inserted on the position marked by this method.
	 * @param int $page page number (default is the current page)
	 * @protected
	 * @since 4.6.021 (2009-07-20)
	 */
	protected function setContentMark($page=0) {
		if ($page <= 0) {
			$page = $this->page;
		}
		if (isset($this->footerlen[$page])) {
			$this->cntmrk[$page] = $this->pagelen[$page] - $this->footerlen[$page];
		} else {
			$this->cntmrk[$page] = $this->pagelen[$page];
		}
	}

	/**
	 * Set header data.
	 * @param string $ln header image logo
	 * @param string $lw header image logo width in mm
	 * @param string $ht string to print as title on document header
	 * @param string $hs string to print on document header
	 * @param array $tc RGB array color for text.
	 * @param array $lc RGB array color for line.
	 * @public
	 */
	public function setHeaderData($ln='', $lw=0, $ht='', $hs='', $tc=array(0,0,0), $lc=array(0,0,0)) {
		$this->header_logo = $ln;
		$this->header_logo_width = $lw;
		$this->header_title = $ht;
		$this->header_string = $hs;
		$this->header_text_color = $tc;
		$this->header_line_color = $lc;
	}

	/**
	 * Set footer data.
	 * @param array $tc RGB array color for text.
	 * @param array $lc RGB array color for line.
	 * @public
	 */
	public function setFooterData($tc=array(0,0,0), $lc=array(0,0,0)) {
		$this->footer_text_color = $tc;
		$this->footer_line_color = $lc;
	}

	/**
	 * Returns header data:
	 * <ul><li>$ret['logo'] = logo image</li><li>$ret['logo_width'] = width of the image logo in user units</li><li>$ret['title'] = header title</li><li>$ret['string'] = header description string</li></ul>
	 * @return array<string,mixed>
	 * @public
	 * @since 4.0.012 (2008-07-24)
	 */
	public function getHeaderData() {
		$ret = array();
		$ret['logo'] = $this->header_logo;
		$ret['logo_width'] = $this->header_logo_width;
		$ret['title'] = $this->header_title;
		$ret['string'] = $this->header_string;
		$ret['text_color'] = $this->header_text_color;
		$ret['line_color'] = $this->header_line_color;
		return $ret;
	}

	/**
	 * Set header margin.
	 * (minimum distance between header and top page margin)
	 * @param int $hm distance in user units
	 * @public
	 */
	public function setHeaderMargin($hm=10) {
		$this->header_margin = $hm;
	}

	/**
	 * Returns header margin in user units.
	 * @return float
	 * @since 4.0.012 (2008-07-24)
	 * @public
	 */
	public function getHeaderMargin() {
		return $this->header_margin;
	}

	/**
	 * Set footer margin.
	 * (minimum distance between footer and bottom page margin)
	 * @param int $fm distance in user units
	 * @public
	 */
	public function setFooterMargin($fm=10) {
		$this->footer_margin = $fm;
	}

	/**
	 * Returns footer margin in user units.
	 * @return float
	 * @since 4.0.012 (2008-07-24)
	 * @public
	 */
	public function getFooterMargin() {
		return $this->footer_margin;
	}
	/**
	 * Set a flag to print page header.
	 * @param boolean $val set to true to print the page header (default), false otherwise.
	 * @public
	 */
	public function setPrintHeader($val=true) {
		$this->print_header = $val ? true : false;
	}

	/**
	 * Set a flag to print page footer.
	 * @param boolean $val set to true to print the page footer (default), false otherwise.
	 * @public
	 */
	public function setPrintFooter($val=true) {
		$this->print_footer = $val ? true : false;
	}

	/**
	 * Return the right-bottom (or left-bottom for RTL) corner X coordinate of last inserted image
	 * @return float
	 * @public
	 */
	public function getImageRBX() {
		return $this->img_rb_x;
	}

	/**
	 * Return the right-bottom (or left-bottom for RTL) corner Y coordinate of last inserted image
	 * @return float
	 * @public
	 */
	public function getImageRBY() {
		return $this->img_rb_y;
	}

	/**
	 * Reset the xobject template used by Header() method.
	 * @public
	 */
	public function resetHeaderTemplate() {
		$this->header_xobjid = false;
	}

	/**
	 * Set a flag to automatically reset the xobject template used by Header() method at each page.
	 * @param boolean $val set to true to reset Header xobject template at each page, false otherwise.
	 * @public
	 */
	public function setHeaderTemplateAutoreset($val=true) {
		$this->header_xobj_autoreset = $val ? true : false;
	}

	/**
	 * This method is used to render the page header.
	 * It is automatically called by AddPage() and could be overwritten in your own inherited class.
	 * @public
	 */
	public function Header() {
		if ($this->header_xobjid === false) {
			// start a new XObject Template
			$this->header_xobjid = $this->startTemplate($this->w, $this->tMargin);
			$headerfont = $this->getHeaderFont();
			$headerdata = $this->getHeaderData();
			$this->y = $this->header_margin;
			if ($this->rtl) {
				$this->x = $this->w - $this->original_rMargin;
			} else {
				$this->x = $this->original_lMargin;
			}
			if (($headerdata['logo']) AND ($headerdata['logo'] != K_BLANK_IMAGE)) {
				$imgtype = TCPDF_IMAGES::getImageFileType(K_PATH_IMAGES.$headerdata['logo']);
				if (($imgtype == 'eps') OR ($imgtype == 'ai')) {
					$this->ImageEps(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				} elseif ($imgtype == 'svg') {
					$this->ImageSVG(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				} else {
					$this->Image(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				}
				$imgy = $this->getImageRBY();
			} else {
				$imgy = $this->y;
			}
			$cell_height = $this->getCellHeight($headerfont[2] / $this->k);
			// set starting margin for text data cell
			if ($this->getRTL()) {
				$header_x = $this->original_rMargin + ($headerdata['logo_width'] * 1.1);
			} else {
				$header_x = $this->original_lMargin + ($headerdata['logo_width'] * 1.1);
			}
			$cw = $this->w - $this->original_lMargin - $this->original_rMargin - ($headerdata['logo_width'] * 1.1);
			$this->SetTextColorArray($this->header_text_color);
			// header title
			$this->SetFont($headerfont[0], 'B', $headerfont[2] + 1);
			$this->SetX($header_x);
			$this->Cell($cw, $cell_height, $headerdata['title'], 0, 1, '', 0, '', 0);
			// header string
			$this->SetFont($headerfont[0], $headerfont[1], $headerfont[2]);
			$this->SetX($header_x);
			$this->MultiCell($cw, $cell_height, $headerdata['string'], 0, '', 0, 1, '', '', true, 0, false, true, 0, 'T', false);
			// print an ending header line
			$this->SetLineStyle(array('width' => 0.85 / $this->k, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $headerdata['line_color']));
			$this->SetY((2.835 / $this->k) + max($imgy, $this->y));
			if ($this->rtl) {
				$this->SetX($this->original_rMargin);
			} else {
				$this->SetX($this->original_lMargin);
			}
			$this->Cell(($this->w - $this->original_lMargin - $this->original_rMargin), 0, '', 'T', 0, 'C');
			$this->endTemplate();
		}
		// print header template
		$x = 0;
		$dx = 0;
		if (!$this->header_xobj_autoreset AND $this->booklet AND (($this->page % 2) == 0)) {
			// adjust margins for booklet mode
			$dx = ($this->original_lMargin - $this->original_rMargin);
		}
		if ($this->rtl) {
			$x = $this->w + $dx;
		} else {
			$x = 0 + $dx;
		}
		$this->printTemplate($this->header_xobjid, $x, 0, 0, 0, '', '', false);
		if ($this->header_xobj_autoreset) {
			// reset header xobject template at each page
			$this->header_xobjid = false;
		}
	}

	/**
	 * This method is used to render the page footer.
	 * It is automatically called by AddPage() and could be overwritten in your own inherited class.
	 * @public
	 */
	public function Footer() {
		$cur_y = $this->y;
		$this->SetTextColorArray($this->footer_text_color);
		//set style for cell border
		$line_width = (0.85 / $this->k);
		$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));
		//print document barcode
		$barcode = $this->getBarcode();
		if (!empty($barcode)) {
			$this->Ln($line_width);
			$barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
			$style = array(
				'position' => $this->rtl?'R':'L',
				'align' => $this->rtl?'R':'L',
				'stretch' => false,
				'fitwidth' => true,
				'cellfitalign' => '',
				'border' => false,
				'padding' => 0,
				'fgcolor' => array(0,0,0),
				'bgcolor' => false,
				'text' => false
			);
			$this->write1DBarcode($barcode, 'C128', '', $cur_y + $line_width, '', (($this->footer_margin / 3) - $line_width), 0.3, $style, '');
		}
		$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
		if (empty($this->pagegroups)) {
			$pagenumtxt = $w_page.$this->getAliasNumPage().' / '.$this->getAliasNbPages();
		} else {
			$pagenumtxt = $w_page.$this->getPageNumGroupAlias().' / '.$this->getPageGroupAlias();
		}
		$this->SetY($cur_y);
		//Print page number
		if ($this->getRTL()) {
			$this->SetX($this->original_rMargin);
			$this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
		} else {
			$this->SetX($this->original_lMargin);
			$this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
		}
	}

	/**
	 * This method is used to render the page header.
	 * @protected
	 * @since 4.0.012 (2008-07-24)
	 */
	protected function setHeader() {
		if (!$this->print_header OR ($this->state != 2)) {
			return;
		}
		$this->InHeader = true;
		$this->setGraphicVars($this->default_graphic_vars);
		$temp_thead = $this->thead;
		$temp_theadMargins = $this->theadMargins;
		$lasth = $this->lasth;
		$newline = $this->newline;
		$this->_outSaveGraphicsState();
		$this->rMargin = $this->original_rMargin;
		$this->lMargin = $this->original_lMargin;
		$this->SetCellPadding(0);
		//set current position
		if ($this->rtl) {
			$this->SetXY($this->original_rMargin, $this->header_margin);
		} else {
			$this->SetXY($this->original_lMargin, $this->header_margin);
		}
		$this->SetFont($this->header_font[0], $this->header_font[1], $this->header_font[2]);
		$this->Header();
		//restore position
		if ($this->rtl) {
			$this->SetXY($this->original_rMargin, $this->tMargin);
		} else {
			$this->SetXY($this->original_lMargin, $this->tMargin);
		}
		$this->_outRestoreGraphicsState();
		$this->lasth = $lasth;
		$this->thead = $temp_thead;
		$this->theadMargins = $temp_theadMargins;
		$this->newline = $newline;
		$this->InHeader = false;
	}

	/**
	 * This method is used to render the page footer.
	 * @protected
	 * @since 4.0.012 (2008-07-24)
	 */
	protected function setFooter() {
		if ($this->state != 2) {
			return;
		}
		$this->InFooter = true;
		// save current graphic settings
		$gvars = $this->getGraphicVars();
		// mark this point
		$this->footerpos[$this->page] = $this->pagelen[$this->page];
		$this->_out("\n");
		if ($this->print_footer) {
			$this->setGraphicVars($this->default_graphic_vars);
			$this->current_column = 0;
			$this->num_columns = 1;
			$temp_thead = $this->thead;
			$temp_theadMargins = $this->theadMargins;
			$lasth = $this->lasth;
			$this->_outSaveGraphicsState();
			$this->rMargin = $this->original_rMargin;
			$this->lMargin = $this->original_lMargin;
			$this->SetCellPadding(0);
			//set current position
			$footer_y = $this->h - $this->footer_margin;
			if ($this->rtl) {
				$this->SetXY($this->original_rMargin, $footer_y);
			} else {
				$this->SetXY($this->original_lMargin, $footer_y);
			}
			$this->SetFont($this->footer_font[0], $this->footer_font[1], $this->footer_font[2]);
			$this->Footer();
			//restore position
			if ($this->rtl) {
				$this->SetXY($this->original_rMargin, $this->tMargin);
			} else {
				$this->SetXY($this->original_lMargin, $this->tMargin);
			}
			$this->_outRestoreGraphicsState();
			$this->lasth = $lasth;
			$this->thead = $temp_thead;
			$this->theadMargins = $temp_theadMargins;
		}
		// restore graphic settings
		$this->setGraphicVars($gvars);
		$this->current_column = $gvars['current_column'];
		$this->num_columns = $gvars['num_columns'];
		// calculate footer length
		$this->footerlen[$this->page] = $this->pagelen[$this->page] - $this->footerpos[$this->page] + 1;
		$this->InFooter = false;
	}

	/**
	 * Check if we are on the page body (excluding page header and footer).
	 * @return true if we are not in page header nor in page footer, false otherwise.
	 * @protected
	 * @since 5.9.091 (2011-06-15)
	 */
	protected function inPageBody() {
		return (($this->InHeader === false) AND ($this->InFooter === false));
	}

	/**
	 * This method is used to render the table header on new page (if any).
	 * @protected
	 * @since 4.5.030 (2009-03-25)
	 */
	protected function setTableHeader() {
		if ($this->num_columns > 1) {
			// multi column mode
			return;
		}
		if (isset($this->theadMargins['top'])) {
			// restore the original top-margin
			$this->tMargin = $this->theadMargins['top'];
			$this->pagedim[$this->page]['tm'] = $this->tMargin;
			$this->y = $this->tMargin;
		}
		if (!TCPDF_STATIC::empty_string($this->thead) AND (!$this->inthead)) {
			// set margins
			$prev_lMargin = $this->lMargin;
			$prev_rMargin = $this->rMargin;
			$prev_cell_padding = $this->cell_padding;
			$this->lMargin = $this->theadMargins['lmargin'] + ($this->pagedim[$this->page]['olm'] - $this->pagedim[$this->theadMargins['page']]['olm']);
			$this->rMargin = $this->theadMargins['rmargin'] + ($this->pagedim[$this->page]['orm'] - $this->pagedim[$this->theadMargins['page']]['orm']);
			$this->cell_padding = $this->theadMargins['cell_padding'];
			if ($this->rtl) {
				$this->x = $this->w - $this->rMargin;
			} else {
				$this->x = $this->lMargin;
			}
			// account for special "cell" mode
			if ($this->theadMargins['cell']) {
				if ($this->rtl) {
					$this->x -= $this->cell_padding['R'];
				} else {
					$this->x += $this->cell_padding['L'];
				}
			}
			$gvars = $this->getGraphicVars();
			if (!empty($this->theadMargins['gvars'])) {
				// set the correct graphic style
				$this->setGraphicVars($this->theadMargins['gvars']);
				$this->rMargin = $gvars['rMargin'];
				$this->lMargin = $gvars['lMargin'];
			}
			// print table header
			$this->writeHTML($this->thead, false, false, false, false, '');
			$this->setGraphicVars($gvars);
			// set new top margin to skip the table headers
			if (!isset($this->theadMargins['top'])) {
				$this->theadMargins['top'] = $this->tMargin;
			}
			// store end of header position
			if (!isset($this->columns[0]['th'])) {
				$this->columns[0]['th'] = array();
			}
			$this->columns[0]['th']['\''.$this->page.'\''] = $this->y;
			$this->tMargin = $this->y;
			$this->pagedim[$this->page]['tm'] = $this->tMargin;
			$this->lasth = 0;
			$this->lMargin = $prev_lMargin;
			$this->rMargin = $prev_rMargin;
			$this->cell_padding = $prev_cell_padding;
		}
	}

	/**
	 * Returns the current page number.
	 * @return int page number
	 * @public
	 * @since 1.0
	 * @see getAliasNbPages()
	 */
	public function PageNo() {
		return $this->page;
	}

	/**
	 * Returns the array of spot colors.
	 * @return array Spot colors array.
	 * @public
	 * @since 6.0.038 (2013-09-30)
	 */
	public function getAllSpotColors() {
		return $this->spot_colors;
	}

	/**
	 * Defines a new spot color.
	 * It can be expressed in RGB components or gray scale.
	 * The method can be called before the first page is created and the value is retained from page to page.
	 * @param string $name Full name of the spot color.
	 * @param float $c Cyan color for CMYK. Value between 0 and 100.
	 * @param float $m Magenta color for CMYK. Value between 0 and 100.
	 * @param float $y Yellow color for CMYK. Value between 0 and 100.
	 * @param float $k Key (Black) color for CMYK. Value between 0 and 100.
	 * @public
	 * @since 4.0.024 (2008-09-12)
	 * @see SetDrawSpotColor(), SetFillSpotColor(), SetTextSpotColor()
	 */
	public function AddSpotColor($name, $c, $m, $y, $k) {
		if (!isset($this->spot_colors[$name])) {
			$i = (1 + count($this->spot_colors));
			$this->spot_colors[$name] = array('C' => $c, 'M' => $m, 'Y' => $y, 'K' => $k, 'name' => $name, 'i' => $i);
		}
	}

	/**
	 * Set the spot color for the specified type ('draw', 'fill', 'text').
	 * @param string $type Type of object affected by this color: ('draw', 'fill', 'text').
	 * @param string $name Name of the spot color.
	 * @param float $tint Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
	 * @return string PDF color command.
	 * @public
	 * @since 5.9.125 (2011-10-03)
	 */
	public function setSpotColor($type, $name, $tint=100) {
		$spotcolor = TCPDF_COLORS::getSpotColor($name, $this->spot_colors);
		if ($spotcolor === false) {
			$this->Error('Undefined spot color: '.$name.', you must add it using the AddSpotColor() method.');
		}
		$tint = (max(0, min(100, $tint)) / 100);
		$pdfcolor = sprintf('/CS%d ', $this->spot_colors[$name]['i']);
		switch ($type) {
			case 'draw': {
				$pdfcolor .= sprintf('CS %F SCN', $tint);
				$this->DrawColor = $pdfcolor;
				$this->strokecolor = $spotcolor;
				break;
			}
			case 'fill': {
				$pdfcolor .= sprintf('cs %F scn', $tint);
				$this->FillColor = $pdfcolor;
				$this->bgcolor = $spotcolor;
				break;
			}
			case 'text': {
				$pdfcolor .= sprintf('cs %F scn', $tint);
				$this->TextColor = $pdfcolor;
				$this->fgcolor = $spotcolor;
				break;
			}
		}
		$this->ColorFlag = ($this->FillColor != $this->TextColor);
		if ($this->state == 2) {
			$this->_out($pdfcolor);
		}
		if ($this->inxobj) {
			// we are inside an XObject template
			$this->xobjects[$this->xobjid]['spot_colors'][$name] = $this->spot_colors[$name];
		}
		return $pdfcolor;
	}

	/**
	 * Defines the spot color used for all drawing operations (lines, rectangles and cell borders).
	 * @param string $name Name of the spot color.
	 * @param float $tint Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
	 * @public
	 * @since 4.0.024 (2008-09-12)
	 * @see AddSpotColor(), SetFillSpotColor(), SetTextSpotColor()
	 */
	public function SetDrawSpotColor($name, $tint=100) {
		$this->setSpotColor('draw', $name, $tint);
	}

	/**
	 * Defines the spot color used for all filling operations (filled rectangles and cell backgrounds).
	 * @param string $name Name of the spot color.
	 * @param float $tint Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
	 * @public
	 * @since 4.0.024 (2008-09-12)
	 * @see AddSpotColor(), SetDrawSpotColor(), SetTextSpotColor()
	 */
	public function SetFillSpotColor($name, $tint=100) {
		$this->setSpotColor('fill', $name, $tint);
	}

	/**
	 * Defines the spot color used for text.
	 * @param string $name Name of the spot color.
	 * @param int $tint Intensity of the color (from 0 to 100 ; 100 = full intensity by default).
	 * @public
	 * @since 4.0.024 (2008-09-12)
	 * @see AddSpotColor(), SetDrawSpotColor(), SetFillSpotColor()
	 */
	public function SetTextSpotColor($name, $tint=100) {
		$this->setSpotColor('text', $name, $tint);
	}

	/**
	 * Set the color array for the specified type ('draw', 'fill', 'text').
	 * It can be expressed in RGB, CMYK or GRAY SCALE components.
	 * The method can be called before the first page is created and the value is retained from page to page.
	 * @param string $type Type of object affected by this color: ('draw', 'fill', 'text').
	 * @param array $color Array of colors (1=gray, 3=RGB, 4=CMYK or 5=spotcolor=CMYK+name values).
	 * @param boolean $ret If true do not send the PDF command.
	 * @return string The PDF command or empty string.
	 * @public
	 * @since 3.1.000 (2008-06-11)
	 */
	public function setColorArray($type, $color, $ret=false) {
		if (is_array($color)) {
			$color = array_values($color);
			// component: grey, RGB red or CMYK cyan
			$c = isset($color[0]) ? $color[0] : -1;
			// component: RGB green or CMYK magenta
			$m = isset($color[1]) ? $color[1] : -1;
			// component: RGB blue or CMYK yellow
			$y = isset($color[2]) ? $color[2] : -1;
			// component: CMYK black
			$k = isset($color[3]) ? $color[3] : -1;
			// color name
			$name = isset($color[4]) ? $color[4] : '';
			if ($c >= 0) {
				return $this->setColor($type, $c, $m, $y, $k, $ret, $name);
			}
		}
		return '';
	}

	/**
	 * Defines the color used for all drawing operations (lines, rectangles and cell borders).
	 * It can be expressed in RGB, CMYK or GRAY SCALE components.
	 * The method can be called before the first page is created and the value is retained from page to page.
	 * @param array $color Array of colors (1, 3 or 4 values).
	 * @param boolean $ret If true do not send the PDF command.
	 * @return string the PDF command
	 * @public
	 * @since 3.1.000 (2008-06-11)
	 * @see SetDrawColor()
	 */
	public function SetDrawColorArray($color, $ret=false) {
		return $this->setColorArray('draw', $color, $ret);
	}

	/**
	 * Defines the color used for all filling operations (filled rectangles and cell backgrounds).
	 * It can be expressed in RGB, CMYK or GRAY SCALE components.
	 * The method can be called before the first page is created and the value is retained from page to page.
	 * @param array $color Array of colors (1, 3 or 4 values).
	 * @param boolean $ret If true do not send the PDF command.
	 * @public
	 * @since 3.1.000 (2008-6-11)
	 * @see SetFillColor()
	 */
	public function SetFillColorArray($color, $ret=false) {
		return $this->setColorArray('fill', $color, $ret);
	}

	/**
	 * Defines the color used for text. It can be expressed in RGB components or gray scale.
	 * The method can be called before the first page is created and the value is retained from page to page.
	 * @param array $color Array of colors (1, 3 or 4 values).
	 * @param boolean $ret If true do not send the PDF command.
	 * @public
	 * @since 3.1.000 (2008-6-11)
	 * @see SetFillColor()
	 */
	public function SetTextColorArray($color, $ret=false) {
		return $this->setColorArray('text', $color, $ret);
	}

	/**
	 * Defines the color used by the specified type ('draw', 'fill', 'text').
	 * @param string $type Type of object affected by this color: ('draw', 'fill', 'text').
	 * @param float $col1 GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
	 * @param float $col2 GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
	 * @param float $col3 BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
	 * @param float $col4 KEY (BLACK) color for CMYK (0-100).
	 * @param boolean $ret If true do not send the command.
	 * @param string $name spot color name (if any)
	 * @return string The PDF command or empty string.
	 * @public
	 * @since 5.9.125 (2011-10-03)
	 */
	public function setColor($type, $col1=0, $col2=-1, $col3=-1, $col4=-1, $ret=false, $name='') {
		// set default values
		if (!is_numeric($col1)) {
			$col1 = 0;
		}
		if (!is_numeric($col2)) {
			$col2 = -1;
		}
		if (!is_numeric($col3)) {
			$col3 = -1;
		}
		if (!is_numeric($col4)) {
			$col4 = -1;
		}
		// set color by case
		$suffix = '';
		if (($col2 == -1) AND ($col3 == -1) AND ($col4 == -1)) {
			// Grey scale
			$col1 = max(0, min(255, $col1));
			$intcolor = array('G' => $col1);
			$pdfcolor = sprintf('%F ', ($col1 / 255));
			$suffix = 'g';
		} elseif ($col4 == -1) {
			// RGB
			$col1 = max(0, min(255, $col1));
			$col2 = max(0, min(255, $col2));
			$col3 = max(0, min(255, $col3));
			$intcolor = array('R' => $col1, 'G' => $col2, 'B' => $col3);
			$pdfcolor = sprintf('%F %F %F ', ($col1 / 255), ($col2 / 255), ($col3 / 255));
			$suffix = 'rg';
		} else {
			$col1 = max(0, min(100, $col1));
			$col2 = max(0, min(100, $col2));
			$col3 = max(0, min(100, $col3));
			$col4 = max(0, min(100, $col4));
			if (empty($name)) {
				// CMYK
				$intcolor = array('C' => $col1, 'M' => $col2, 'Y' => $col3, 'K' => $col4);
				$pdfcolor = sprintf('%F %F %F %F ', ($col1 / 100), ($col2 / 100), ($col3 / 100), ($col4 / 100));
				$suffix = 'k';
			} else {
				// SPOT COLOR
				$intcolor = array('C' => $col1, 'M' => $col2, 'Y' => $col3, 'K' => $col4, 'name' => $name);
				$this->AddSpotColor($name, $col1, $col2, $col3, $col4);
				$pdfcolor = $this->setSpotColor($type, $name, 100);
			}
		}
		switch ($type) {
			case 'draw': {
				$pdfcolor .= strtoupper($suffix);
				$this->DrawColor = $pdfcolor;
				$this->strokecolor = $intcolor;
				break;
			}
			case 'fill': {
				$pdfcolor .= $suffix;
				$this->FillColor = $pdfcolor;
				$this->bgcolor = $intcolor;
				break;
			}
			case 'text': {
				$pdfcolor .= $suffix;
				$this->TextColor = $pdfcolor;
				$this->fgcolor = $intcolor;
				break;
			}
		}
		$this->ColorFlag = ($this->FillColor != $this->TextColor);
		if (($type != 'text') AND ($this->state == 2)) {
			if (!$ret) {
				$this->_out($pdfcolor);
			}
			return $pdfcolor;
		}
		return '';
	}

	/**
	 * Defines the color used for all drawing operations (lines, rectangles and cell borders). It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
	 * @param float $col1 GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
	 * @param float $col2 GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
	 * @param float $col3 BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
	 * @param float $col4 KEY (BLACK) color for CMYK (0-100).
	 * @param boolean $ret If true do not send the command.
	 * @param string $name spot color name (if any)
	 * @return string the PDF command
	 * @public
	 * @since 1.3
	 * @see SetDrawColorArray(), SetFillColor(), SetTextColor(), Line(), Rect(), Cell(), MultiCell()
	 */
	public function SetDrawColor($col1=0, $col2=-1, $col3=-1, $col4=-1, $ret=false, $name='') {
		return $this->setColor('draw', $col1, $col2, $col3, $col4, $ret, $name);
	}

	/**
	 * Defines the color used for all filling operations (filled rectangles and cell backgrounds). It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
	 * @param float $col1 GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
	 * @param float $col2 GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
	 * @param float $col3 BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
	 * @param float $col4 KEY (BLACK) color for CMYK (0-100).
	 * @param boolean $ret If true do not send the command.
	 * @param string $name Spot color name (if any).
	 * @return string The PDF command.
	 * @public
	 * @since 1.3
	 * @see SetFillColorArray(), SetDrawColor(), SetTextColor(), Rect(), Cell(), MultiCell()
	 */
	public function SetFillColor($col1=0, $col2=-1, $col3=-1, $col4=-1, $ret=false, $name='') {
		return $this->setColor('fill', $col1, $col2, $col3, $col4, $ret, $name);
	}

	/**
	 * Defines the color used for text. It can be expressed in RGB components or gray scale. The method can be called before the first page is created and the value is retained from page to page.
	 * @param float $col1 GRAY level for single color, or Red color for RGB (0-255), or CYAN color for CMYK (0-100).
	 * @param float $col2 GREEN color for RGB (0-255), or MAGENTA color for CMYK (0-100).
	 * @param float $col3 BLUE color for RGB (0-255), or YELLOW color for CMYK (0-100).
	 * @param float $col4 KEY (BLACK) color for CMYK (0-100).
	 * @param boolean $ret If true do not send the command.
	 * @param string $name Spot color name (if any).
	 * @return string Empty string.
	 * @public
	 * @since 1.3
	 * @see SetTextColorArray(), SetDrawColor(), SetFillColor(), Text(), Cell(), MultiCell()
	 */
	public function SetTextColor($col1=0, $col2=-1, $col3=-1, $col4=-1, $ret=false, $name='') {
		return $this->setColor('text', $col1, $col2, $col3, $col4, $ret, $name);
	}

	/**
	 * Returns the length of a string in user unit. A font must be selected.<br>
	 * @param string $s The string whose length is to be computed
	 * @param string $fontname Family font. It can be either a name defined by AddFont() or one of the standard families. It is also possible to pass an empty string, in that case, the current family is retained.
	 * @param string $fontstyle Font style. Possible values are (case insensitive):<ul><li>empty string: regular</li><li>B: bold</li><li>I: italic</li><li>U: underline</li><li>D: line-through</li><li>O: overline</li></ul> or any combination. The default value is regular.
	 * @param float $fontsize Font size in points. The default value is the current size.
	 * @param boolean $getarray if true returns an array of characters widths, if false returns the total length.
	 * @return mixed int total string length or array of characted widths
	 * @author Nicola Asuni
	 * @public
	 * @since 1.2
	 */
	public function GetStringWidth($s, $fontname='', $fontstyle='', $fontsize=0, $getarray=false) {
		return $this->GetArrStringWidth(TCPDF_FONTS::utf8Bidi(TCPDF_FONTS::UTF8StringToArray($s, $this->isunicode, $this->CurrentFont), $s, $this->tmprtl, $this->isunicode, $this->CurrentFont), $fontname, $fontstyle, $fontsize, $getarray);
	}

	/**
	 * Returns the string length of an array of chars in user unit or an array of characters widths. A font must be selected.<br>
	 * @param string $sa The array of chars whose total length is to be computed
	 * @param string $fontname Family font. It can be either a name defined by AddFont() or one of the standard families. It is also possible to pass an empty string, in that case, the curre