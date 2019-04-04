<?php

/**
 * BDThemes Shortcode Ultimate
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 * Special thanks to Vladimir Anokhin who permit us to make this plugin like his shortcode ultimate wordpress plugin.
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Class for managing plugin data
 */
class Su_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return array(
			 'all' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALL'),
			 'content' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CONTENT'),
			 'box' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BOX'),
			 "media" => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_MEDIA'),
			 'gallery' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GALLERY'),
			 'other' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_OTHER'),
			 'template' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEMPLATE')
		 );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return array(
			'none'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_NONE'),
			'solid'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOLID'),
			'dotted' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOTTED'),
			'dashed' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DASHED'),
			'double' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DOUBLE'),
			'groove' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GROOVE'),
			'ridge'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIDGE')
		);
	}

	//Font-Awesome icons
	public static function icons() {
		return array('glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'th', 'th-list', 'check', 'remove', 'close', 'times', 'search-plus', 'search-minus', 'power-off', 'signal', 'gear', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-down', 'arrow-circle-o-up', 'inbox', 'play-circle-o', 'rotate-right', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'dedent', 'outdent', 'indent', 'video-camera', 'photo', 'image', 'picture-o', 'pencil', 'map-marker', 'adjust', 'tint', 'edit', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circle', 'crosshairs', 'times-circle-o', 'check-circle-o', 'ban', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'mail-forward', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circle', 'gift', 'leaf', 'fire', 'eye', 'eye-slash', 'warning', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder', 'folder-open', 'arrows-v', 'arrows-h', 'bar-chart-o', 'bar-chart', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'gears', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-o', 'sign-out', 'linkedin-square', 'thumb-tack', 'external-link', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebook-f', 'facebook', 'github', 'unlock', 'credit-card', 'feed', 'rss', 'hdd-o', 'bullhorn', 'bell', 'certificate', 'hand-o-right', 'hand-o-left', 'hand-o-up', 'hand-o-down', 'arrow-circle-left', 'arrow-circle-right', 'arrow-circle-up', 'arrow-circle-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'arrows-alt', 'group', 'users', 'chain', 'link', 'cloud', 'flask', 'cut', 'scissors', 'copy', 'files-o', 'paperclip', 'save', 'floppy-o', 'square', 'navicon', 'reorder', 'bars', 'list-ul', 'list-ol', 'strikethrough', 'underline', 'table', 'magic', 'truck', 'pinterest', 'pinterest-square', 'google-plus-square', 'google-plus', 'money', 'caret-down', 'caret-up', 'caret-left', 'caret-right', 'columns', 'unsorted', 'sort', 'sort-down', 'sort-desc', 'sort-up', 'sort-asc', 'envelope', 'linkedin', 'rotate-left', 'undo', 'legal', 'gavel', 'dashboard', 'tachometer', 'comment-o', 'comments-o', 'flash', 'bolt', 'sitemap', 'umbrella', 'paste', 'clipboard', 'lightbulb-o', 'exchange', 'cloud-download', 'cloud-upload', 'user-md', 'stethoscope', 'suitcase', 'bell-o', 'coffee', 'cutlery', 'file-text-o', 'building-o', 'hospital-o', 'ambulance', 'medkit', 'fighter-jet', 'beer', 'h-square', 'plus-square', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tablet', 'mobile-phone', 'mobile', 'circle-o', 'quote-left', 'quote-right', 'spinner', 'circle', 'mail-reply', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-o', 'gamepad', 'keyboard-o', 'flag-o', 'flag-checkered', 'terminal', 'code', 'mail-reply-all', 'reply-all', 'star-half-empty', 'star-half-full', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'unlink', 'chain-broken', 'question', 'info', 'exclamation', 'superscript', 'subscript', 'eraser', 'puzzle-piece', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-down', 'html5', 'css3', 'anchor', 'unlock-alt', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-square', 'pencil-square', 'external-link-square', 'share-square', 'compass', 'toggle-down', 'caret-square-o-down', 'toggle-up', 'caret-square-o-up', 'toggle-right', 'caret-square-o-right', 'euro', 'eur', 'gbp', 'dollar', 'usd', 'rupee', 'inr', 'cny', 'rmb', 'yen', 'jpy', 'ruble', 'rouble', 'rub', 'won', 'krw', 'bitcoin', 'btc', 'file', 'file-text', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-play', 'dropbox', 'stack-overflow', 'instagram', 'flickr', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windows', 'android', 'linux', 'dribbble', 'skype', 'foursquare', 'trello', 'female', 'male', 'gittip', 'gratipay', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weibo', 'renren', 'pagelines', 'stack-exchange', 'arrow-circle-o-right', 'arrow-circle-o-left', 'toggle-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'turkish-lira', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpress', 'openid', 'institution', 'bank', 'university', 'mortar-board', 'graduation-cap', 'yahoo', 'google', 'reddit', 'reddit-square', 'stumbleupon-circle', 'stumbleupon', 'delicious', 'digg', 'pied-piper-pp', 'pied-piper-alt', 'drupal', 'joomla', 'language', 'fax', 'building', 'child', 'paw', 'spoon', 'cube', 'cubes', 'behance', 'behance-square', 'steam', 'steam-square', 'recycle', 'automobile', 'car', 'cab', 'taxi', 'tree', 'spotify', 'deviantart', 'soundcloud', 'database', 'file-pdf-o', 'file-word-o', 'file-excel-o', 'file-powerpoint-o', 'file-photo-o', 'file-picture-o', 'file-image-o', 'file-zip-o', 'file-archive-o', 'file-sound-o', 'file-audio-o', 'file-movie-o', 'file-video-o', 'file-code-o', 'vine', 'codepen', 'jsfiddle', 'life-bouy', 'life-buoy', 'life-saver', 'support', 'life-ring', 'circle-o-notch', 'ra', 'resistance', 'rebel', 'ge', 'empire', 'git-square', 'git', 'y-combinator-square', 'yc-square', 'hacker-news', 'tencent-weibo', 'qq', 'wechat', 'weixin', 'send', 'paper-plane', 'send-o', 'paper-plane-o', 'history', 'circle-thin', 'header', 'paragraph', 'sliders', 'share-alt', 'share-alt-square', 'bomb', 'soccer-ball-o', 'futbol-o', 'tty', 'binoculars', 'plug', 'slideshare', 'twitch', 'yelp', 'newspaper-o', 'wifi', 'calculator', 'paypal', 'google-wallet', 'cc-visa', 'cc-mastercard', 'cc-discover', 'cc-amex', 'cc-paypal', 'cc-stripe', 'bell-slash', 'bell-slash-o', 'trash', 'copyright', 'at', 'eyedropper', 'paint-brush', 'birthday-cake', 'area-chart', 'pie-chart', 'line-chart', 'lastfm', 'lastfm-square', 'toggle-off', 'toggle-on', 'bicycle', 'bus', 'ioxhost', 'angellist', 'cc', 'shekel', 'sheqel', 'ils', 'meanpath', 'buysellads', 'connectdevelop', 'dashcube', 'forumbee', 'leanpub', 'sellsy', 'shirtsinbulk', 'simplybuilt', 'skyatlas', 'cart-plus', 'cart-arrow-down', 'diamond', 'ship', 'user-secret', 'motorcycle', 'street-view', 'heartbeat', 'venus', 'mars', 'mercury', 'intersex', 'transgender', 'transgender-alt', 'venus-double', 'mars-double', 'venus-mars', 'mars-stroke', 'mars-stroke-v', 'mars-stroke-h', 'neuter', 'genderless', 'facebook-official', 'pinterest-p', 'whatsapp', 'server', 'user-plus', 'user-times', 'hotel', 'bed', 'viacoin', 'train', 'subway', 'medium', 'yc', 'y-combinator', 'optin-monster', 'opencart', 'expeditedssl', 'battery-4', 'battery-full', 'battery-3', 'battery-three-quarters', 'battery-2', 'battery-half', 'battery-1', 'battery-quarter', 'battery-0', 'battery-empty', 'mouse-pointer', 'i-cursor', 'object-group', 'object-ungroup', 'sticky-note', 'sticky-note-o', 'cc-jcb', 'cc-diners-club', 'clone', 'balance-scale', 'hourglass-o', 'hourglass-1', 'hourglass-start', 'hourglass-2', 'hourglass-half', 'hourglass-3', 'hourglass-end', 'hourglass', 'hand-grab-o', 'hand-rock-o', 'hand-stop-o', 'hand-paper-o', 'hand-scissors-o', 'hand-lizard-o', 'hand-spock-o', 'hand-pointer-o', 'hand-peace-o', 'trademark', 'registered', 'creative-commons', 'gg', 'gg-circle', 'tripadvisor', 'odnoklassniki', 'odnoklassniki-square', 'get-pocket', 'wikipedia-w', 'safari', 'chrome', 'firefox', 'opera', 'internet-explorer', 'tv', 'television', 'contao', '500px', 'amazon', 'calendar-plus-o', 'calendar-minus-o', 'calendar-times-o', 'calendar-check-o', 'industry', 'map-pin', 'map-signs', 'map-o', 'map', 'commenting', 'commenting-o', 'houzz', 'vimeo', 'black-tie', 'fonticons', 'reddit-alien', 'edge', 'credit-card-alt', 'codiepie', 'modx', 'fort-awesome', 'usb', 'product-hunt', 'mixcloud', 'scribd', 'pause-circle', 'pause-circle-o', 'stop-circle', 'stop-circle-o', 'shopping-bag', 'shopping-basket', 'hashtag', 'bluetooth', 'bluetooth-b', 'percent', 'gitlab', 'wpbeginner', 'wpforms', 'envira', 'universal-access', 'wheelchair-alt', 'question-circle-o', 'blind', 'audio-description', 'volume-control-phone', 'braille', 'assistive-listening-systems', 'asl-interpreting', 'american-sign-language-interpreting', 'deafness', 'hard-of-hearing', 'deaf', 'glide', 'glide-g', 'signing', 'sign-language', 'low-vision', 'viadeo', 'viadeo-square', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'pied-piper', 'first-order', 'yoast', 'themeisle', 'google-plus-circle', 'google-plus-official');
	}

	// Line Icons array
	public static function line_icons() {
		return array('adjustments','alarmclock','anchor','aperture','attachments','bargraph','basket','beaker','bike','book-open','briefcase2','browser2','calendar','camera','caution','chat','circle-compass','clipboard','clock2','cloud','compass','desktop','dial','document','documents','download','dribbble','edit','envelope','expand','facebook','flag','focus','gears','genius','gift','global','globe2','googleplus','grid','happy','hazardous','heart2','hotairballoon','hourglass','key','laptop2','layers','lifesaver','lightbulb','linegraph','linkedin','lock','magnifying-glass','map-pin','map','megaphone','mic','mobile','newspaper','notebook','paintbrush','paperclip','pencil','phone','picture','pictures','piechart','presentation','pricetags','printer2','profile-female','profile-male','puzzle','quote','recycle','refresh2','ribbon','rss','sad','scissors','scope','search','shield','speedometer','strategy','streetsign','tablet','telescope','toolbox','tools','tools2','traget','trophy','tumblr','twitter','upload','video','wallet','wine','apartment-building','architectural-pen','backpack','bomb','book-download','book','briefcase','browser','buffet-tray','camera-photo','camera-video','cap-chef','cap-crown','cap-hat','car-carrer','cart-down','cart-up','chair-sofa','clock','coffee-blander','color-plate','comment-favorite','comment-with-dot','computer-duel','computer-imac-slim','computer-imac-thick','computer-monitor','coverage','crop','dashboard-meter','database','device-ipad','device-iphone','device-ipod-earphone','device-ipod-headphone','device-ipod-nano','diary','envelope-back','equalizer','gear-wheel','glass-coffee','glass-juice','globe','grid-line','hand-bag','handbag','head-phone','heart','home','hot-dog','ice-cream','ink-feather','input-injection','jar-drop','laptop-mac-book','laptop','link','lock-close','lock-open','magic-wand','magnet','mail-envelope','map-pointer','multiple-paper','mustache','paint-brush-wall-roller','paint-brush','paper-pencil','pen-fountain','pen-point-rounded','pen-point','photo-frame','pot-fire','printer','refresh','remote','seal','shield-plus','shoes','skull','smile-emoticon','sound-note','sound-recorder','spoon-fork','square-anchor-point','support-tools','support-underwater','target-arrow','tea-pot','television-remote','tools-creative','tools-measurement','trash','tube-measurement','umbralla','user-comment','user','arrows-anticlockwise-dashed','arrows-anticlockwise','arrows-button-down','arrows-button-off','arrows-button-on','arrows-button-up','arrows-check','arrows-circle-check','arrows-circle-down','arrows-circle-downleft','arrows-circle-downright','arrows-circle-left','arrows-circle-minus','arrows-circle-plus','arrows-circle-remove','arrows-circle-right','arrows-circle-up','arrows-circle-upleft','arrows-circle-upright','arrows-clockwise-dashed','arrows-clockwise','arrows-compress','arrows-deny','arrows-diagonal','arrows-diagonal2','arrows-down-double-34','arrows-down','arrows-downleft','arrows-downright','arrows-drag-down-dashed','arrows-drag-down','arrows-drag-horiz','arrows-drag-left-dashed','arrows-drag-left','arrows-drag-right-dashed','arrows-drag-right','arrows-drag-up-dashed','arrows-drag-up','arrows-drag-vert','arrows-exclamation','arrows-expand-diagonal1','arrows-expand-horizontal1','arrows-expand-vertical1','arrows-expand','arrows-fit-horizontal','arrows-fit-vertical','arrows-glide-horizontal','arrows-glide-vertical','arrows-glide','arrows-hamburger2','arrows-hamburger1','arrows-horizontal','arrows-info','arrows-keyboard-alt','arrows-keyboard-cmd-29','arrows-keyboard-delete','arrows-keyboard-down-28','arrows-keyboard-left','arrows-keyboard-return','arrows-keyboard-right','arrows-keyboard-shift','arrows-keyboard-tab','arrows-keyboard-up','arrows-left-double-32','arrows-left','arrows-minus','arrows-move-bottom','arrows-move-left','arrows-move-right','arrows-move-top','arrows-move','arrows-move2','arrows-plus','arrows-question','arrows-remove','arrows-right-double-31','arrows-right','arrows-rotate-anti-dashed','arrows-rotate-anti','arrows-rotate-dashed','arrows-rotate','arrows-shrink-diagonal1','arrows-shrink-diagonal2','arrows-shrink-horizonal2','arrows-shrink-horizontal1','arrows-shrink-vertical1','arrows-shrink-vertical2','arrows-shrink','arrows-sign-down','arrows-sign-left','arrows-sign-right','arrows-sign-up','arrows-slide-down1','arrows-slide-down2','arrows-slide-left1','arrows-slide-left2','arrows-slide-right1','arrows-slide-right2','arrows-slide-up1','arrows-slide-up2','arrows-slim-down-dashed','arrows-slim-down','arrows-slim-left-dashed','arrows-slim-left','arrows-slim-right-dashed','arrows-slim-right','arrows-slim-up-dashed','arrows-slim-up','arrows-square-check','arrows-square-down','arrows-square-downleft','arrows-square-downright','arrows-square-left','arrows-square-minus','arrows-square-plus','arrows-square-remove','arrows-square-right','arrows-square-up','arrows-square-upleft','arrows-square-upright','arrows-squares','arrows-stretch-diagonal1','arrows-stretch-diagonal2','arrows-stretch-diagonal3','arrows-stretch-diagonal4','arrows-stretch-horizontal1','arrows-stretch-horizontal2','arrows-stretch-vertical1','arrows-stretch-vertical2','arrows-switch-horizontal','arrows-switch-vertical','arrows-up-double-33','arrows-up','arrows-upleft','arrows-upright','arrows-vertical','accelerator','alarm','anchor','anticlockwise','archive-full','archive','ban','battery-charge','battery-empty','battery-full','battery-half','bolt','book-pen','book-pencil','book','bookmark','calculator','calendar','cards-diamonds','cards-hearts','case','chronometer','clessidre','clock','clockwise','cloud','clubs','compass','cup','diamonds','display','download','bookmark-checck','bookmark-minus','bookmark-plus','bookmark-remove','briefcase-check','briefcase-download','briefcase-flagged','briefcase-minus','briefcase-plus','briefcase-refresh','briefcase-remove','briefcase-search','briefcase-star','briefcase-upload','browser-check','browser-download','browser-minus','browser-plus','browser-refresh','browser-remove','browser-search','browser-star','browser-upload','calendar-check','calendar-cloud','calendar-download','calendar-empty','calendar-flagged','calendar-heart','calendar-minus','calendar-next','calendar-noaccess','calendar-pencil','calendar-plus','calendar-previous','calendar-refresh','calendar-remove','calendar-search','calendar-star','calendar-upload','cloud-check','cloud-download','cloud-minus','cloud-noaccess','cloud-plus','cloud-refresh','cloud-remove','cloud-search','cloud-upload','document-check','document-cloud','document-download','document-flagged','document-graph','document-heart','document-minus','document-next','document-noaccess','document-note','document-pencil','document-picture','document-plus','document-previous','document-refresh','document-remove','document-search','document-star','document-upload','folder-check','folder-cloud','folder-document','folder-download','folder-flagged','folder-graph','folder-heart','folder-minus','folder-next','folder-noaccess','folder-note','folder-pencil','folder-picture','folder-plus','folder-previous','folder-refresh','folder-remove','folder-search','folder-star','folder-upload','mail-check','mail-cloud','mail-document','mail-download','mail-flagged','mail-heart','mail-next','mail-noaccess','mail-note','mail-pencil','mail-picture','mail-previous','mail-refresh','mail-remove','mail-search','mail-star','mail-upload','message-check','message-dots','message-happy','message-heart','message-minus','message-note','message-plus','message-refresh','message-remove','message-sad','smartphone-cloud','smartphone-heart','smartphone-noaccess','smartphone-note','smartphone-pencil','smartphone-picture','smartphone-refresh','smartphone-search','tablet-cloud','tablet-heart','tablet-noaccess','tablet-note','tablet-pencil','tablet-picture','tablet-refresh','tablet-search','todolist-2','todolist-check','todolist-cloud','todolist-download','todolist-flagged','todolist-minus','todolist-noaccess','todolist-pencil','todolist-plus','todolist-refresh','todolist-remove','todolist-search','todolist-star','todolist-upload','exclamation','eye-closed','eye','female','flag1','flag2','floppydisk','folder-multiple','folder','gear','geolocalize-01','geolocalize-05','globe','gunsight','hammer','headset','heart-broken','heart','helm','home','info','ipod','joypad','key','keyboard','laptop','life-buoy','lightbulb','link','lock-open','lock','magic-mouse','magnifier-minus','magnifier-plus','magnifier','mail-multiple','mail-open-text','mail-open','mail','male','map','message-multiple','message-txt','message','mixer2','mouse','notebook-pen','notebook-pencil','notebook','paperplane','pencil-ruler-pen','pencil-ruler','photo','picture-multiple','picture','pin1','pin2','postcard-multiple','postcard','printer','question','rss-alt','server-cloud','server-download','server-upload','server','server2','settings','share','sheet-multiple','sheet-pen','sheet-pencil','sheet-txt','sheet','signs','smartphone','spades','spread-bookmark','spread-text-bookmark','spread-text','spread','star','tablet','target','todo-pen','todo-pencil','todo-txt','todo','todolist-pen','todolist-pencil','trashcan-full','trashcan-refresh','trashcan-remove','trashcan','upload','usb','video','watch','webpage-img-txt','webpage-multiple','webpage-txt','webpage','world','bag-check','bag-cloud','bag-download','bag-minus','bag-plus','bag-refresh','bag-remove','bag-search','bag-upload','bag','banknote','banknotes','basket-check','basket-cloud','basket-download','basket-minus','basket-plus','basket-refresh','basket-remove','basket-search','basket-upload','basket','bath','cart-check','cart-cloud','cart-content','cart-download','cart-minus','cart-plus','cart-refresh','cart-remove','cart-search','cart-upload','cart','cent','colon','creditcard','diamond','dollar','euro','franc','gift','graph-decrease','graph-increase','graph1','graph2','graph3','guarani','kips','lira','megaphone','money','naira','pesos','pound','receipt-bath','receipt-cent','receipt-dollar','receipt-euro','receipt-franc','receipt-guarani','receipt-kips','receipt-lira','receipt-naira','receipt-pesos','receipt-pound','receipt-rublo','receipt-rupee','receipt-tugrik','receipt-won','receipt-yen','receipt-yen2','receipt','recept-colon','rublo','rupee','safe','sale','sales','ticket','tugriks','wallet','won','yen','yen2','beginning-button','bell','cd','diapason','eject-button','end-button','fastforward-button','headphones','ipod','loudspeaker','microphone-old','microphone','mixer','mute','note-multiple','note-single','pause-button','play-button','playlist','radio-ghettoblaster','radio-portable','record','recordplayer','repeat-button','rewind-button','shuffle-button','stop-button','tape','volume-down','volume-up','add-vectorpoint','box-oval','box-polygon','box-rectangle','box-roundedrectangle','character','crop','eyedropper','font-allcaps','font-baseline-shift','font-horizontal-scale','font-kerning','font-leading','font-size','font-smallcapital','font-smallcaps','font-strikethrough','font-tracking','font-underline','font-vertical-scale','horizontal-align-center','horizontal-align-right','horizontal-distribute-center','horizontal-distribute-left','horizontal-distribute-right','indent-firstline','indent-left','indent-right','lasso','layers1','layers2','2columns','3columns','4boxes','4columns','4lines','header-2columns','header-3columns','header-4boxes','header-4columns','header-complex','header-complex2','header-complex3','header-complex4','header-sideleft','header-sideright','header','sidebar-left','sidebar-right','layout-8boxes','layout','magnete','pages','paintbrush','paintbucket','paintroller','paragraph-align-left','paragraph-align-right','paragraph-center','paragraph-justify-all','paragraph-justify-center','paragraph-justify-left','paragraph-justify-right','paragraph-space-after','paragraph-space-before','paragraph','pathfinder-exclude','pathfinder-intersect','pathfinder-subtract','pathfinder-unite','pen-add','pen-remove','pen','pencil','polygonallasso','reflect-horizontal','reflect-vertical','remove-vectorpoint','scale-expand','scale-reduce','selection-oval','selection-polygon','selection-rectangle','selection-roundedrectangle','shape-oval','shape-polygon','shape-rectangle','shape-roundedrectangle','slice','transform-bezier','vector-box','vector-composite','vector-line','vertical-align-bottom','vertical-align-center','vertical-align-top','vertical-distribute-bottom','vertical-distribute-center','vertical-distribute-top','software-horizontal-align-left','aquarius','aries','cancer','capricorn','cloud-drop','cloud-lightning','cloud-snowflake','cloud','downpour-fullmoon','downpour-halfmoon','downpour-sun','drop','first-quarter','fog-fullmoon','fog-halfmoon','fog-sun','fog','fullmoon','gemini','hail-fullmoon','hail-halfmoon','hail-sun','hail','last-quarter','leo','libra','lightning','mistyrain-fullmoon','mistyrain-halfmoon','mistyrain-sun','mistyrain','moon','moondown-full','moondown-half','moonset-full','moonset-half','move2','newmoon','pisces','rain-fullmoon','rain-halfmoon','rain-sun','rain','sagittarius','scorpio','snow-fullmoon','snow-halfmoon','snow-sun','snow','snowflake','star','storm-fullmoon','storm-halfmoon','storm-sun','storm-11','storm-32','sun','sundown','sunset','taurus','tempest-fullmoon','tempest-halfmoon','tempest-sun','tempest','variable-fullmoon','variable-halfmoon','variable-sun','virgo','waning-cresent','waning-gibbous','waxing-cresent','waxing-gibbous','wind-E','wind-fullmoon','wind-halfmoon','wind-N','wind-NE','wind-NW','wind-S','wind-SE','wind-sun','wind-SW','wind-W','wind','windgust');
	}

	/**
	 * Liv icons
	 */
	public static function livicons() {
		return array('at','balloons','bank','bomb','calculator','folders','ice-cream','medkit','paper-plane','wine','address-book','adjust','alarm','albums','align-center','align-justify','align-left','align-right','anchor','android','angle-double-down','angle-double-left','angle-double-right','angle-double-up','angle-down','angle-left','angle-right','angle-up','angle-wide-down','angle-wide-left','angle-wide-right','angle-wide-up','apple','apple-logo','archive-add','archive-extract','arrow-circle-down','arrow-circle-left','arrow-circle-right','arrow-circle-up','arrow-down','arrow-left','arrow-right','arrow-up','asterisk','balance','ban','barchart','barcode','battery','beer','bell','bing','biohazard','bitbucket','blogger','bluetooth','bold','bolt','bookmark','bootstrap','briefcase','brightness-down','brightness-up','brush','bug','calendar','camcoder','camera','camera-alt','car','caret-down','caret-left','caret-right','caret-up','cellphone','certificate','check','check-circle','check-circle-alt','checked-off','checked-on','chevron-down','chevron-left','chevron-right','chevron-up','chrome','circle','circle-alt','clapboard','clip','clock','cloud','cloud-bolts','cloud-down','cloud-rain','cloud-snow','cloud-sun','cloud-up','code','collapse-down','collapse-up','columns','comment','comments','compass','concrete5','connect','credit-card','crop','css3','dashboard','desktop','deviantart','disconnect','doc-landscape','doc-portrait','download','download-alt','dribbble','drop','dropbox','edit','exchange','expand-left','expand-right','external-link','eye-close','eye-open','eyedropper','facebook','facebook-alt','file-export','file-import','film','filter','fire','firefox','flag','flickr','flickr-alt','folder-add','folder-flag','folder-lock','folder-new','folder-open','folder-remove','font','gear','gears','ghost','gift','github','github-alt','glass','globe','google-plus','google-plus-alt','hammer','hand-down','hand-left','hand-right','hand-up','heart','heart-alt','help','home','html5','ie','image','inbox','inbox-empty','inbox-in','inbox-out','indent-left','indent-right','info','instagram','ios','italic','jquery','key','lab','laptop','leaf','legal','linechart','link','linkedin','linkedin-alt','list','list-ol','list-ul','livicon','location','lock','magic','magic-alt','magnet','mail','mail-alt','map','medal','message-add','message-flag','message-in','message-lock','message-new','message-out','message-remove','microphone','minus','minus-alt','money','moon','more','morph-c-o','morph-c-s','morph-c-t-down','morph-c-t-left','morph-c-t-right','morph-c-t-up','morph-o-c','morph-o-s','morph-o-t-down','morph-o-t-left','morph-o-t-right','morph-o-t-up','morph-s-c','morph-s-o','morph-s-t-down','morph-s-t-left','morph-s-t-right','morph-s-t-up','morph-t-down-c','morph-t-down-o','morph-t-down-s','morph-t-left-c','morph-t-left-o','morph-t-left-s','morph-t-right-c','morph-t-right-o','morph-t-right-s','morph-t-up-c','morph-t-up-o','morph-t-up-s','move','music','myspace','new-window','notebook','opera','pacman','paypal','pen','pencil','phone','piechart','piggybank','pin-off','pin-on','pinterest','pinterest-alt','plane-down','plane-up','playlist','plus','plus-alt','presentation','printer','qrcode','question','quote-left','quote-right','raphael','recycled','reddit','redo','refresh','remove','remove-alt','remove-circle','resize-big','resize-big-alt','resize-horizontal','resize-horizontal-alt','resize-small','resize-small-alt','resize-vertical','resize-vertical-alt','responsive','responsive-menu','retweet','rocket','rotate-left','rotate-right','rss','safari','sandglass','save','scissors','screen-full','screen-full-alt','screen-small','screen-small-alt','screenshot','search','servers','settings','share','shield','shopping-cart','shopping-cart-in','shopping-cart-out','shuffle','sign-in','sign-out','signal','sitemap','sky-dish','skype','sort','sort-down','sort-up','soundcloud','speaker','spinner-five','spinner-four','spinner-one','spinner-seven','spinner-six','spinner-three','spinner-two','star-empty','star-full','star-half','stopwatch','striked','stumbleupon','stumbleupon-alt','sun','table','tablet','tag','tags','tasks','text-decrease','text-height','text-increase','text-size','text-width','thermo-down','thermo-up','thumbnails-big','thumbnails-small','thumbs-down','thumbs-up','timer','trash','tree','trophy','truck','tumblr','twitter','twitter-alt','umbrella','underline','undo','unlink','unlock','upload','upload-alt','user','user-add','user-ban','user-flag','user-remove','users','users-add','users-ban','users-remove','vector-circle','vector-curve','vector-line','vector-polygon','vector-square','video-backward','video-eject','video-fast-backward','video-fast-forward','video-forward','video-pause','video-play','video-play-alt','video-step-backward','video-step-forward','video-stop','vimeo','vk','warning','warning-alt','webcam','wifi','wifi-alt','windows','windows8','wordpress','wordpress-alt','wrench','xing','yahoo','youtube','zoom-in','zoom-out');
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return array('bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY', 'lightSpeedIn', 'lightSpeedOut', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'hinge', 'rollIn', 'rollOut', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideInUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight', 'slideOutUp', 'bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'headShake', 'swing', 'tada', 'wobble', 'jello', );
	}

	public static function animations_in() {
		return array('bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'flipInX', 'flipInY', 'lightSpeedIn', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rollIn', 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideInUp');
	}
		
	public static function animations_out() {
		return array('bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flipOutX', 'flipOutY', 'lightSpeedOut', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'rollOut', 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight', 'slideOutUp');
	}

	/**
	 * Easing script animations
	 */
	public static function easings() {
		return array('linear', 'swing', 'jswing', 'easeInQuad', 'easeInCubic', 'easeInQuart', 'easeInQuint', 'easeInSine', 'easeInExpo', 'easeInCirc', 'easeInElastic', 'easeInBack', 'easeInBounce', 'easeOutQuad', 'easeOutCubic', 'easeOutQuart', 'easeOutQuint', 'easeOutSine', 'easeOutExpo', 'easeOutCirc', 'easeOutElastic', 'easeOutBack', 'easeOutBounce', 'easeInOutQuad', 'easeInOutCubic', 'easeInOutQuart', 'easeInOutQuint', 'easeInOutSine', 'easeInOutExpo', 'easeInOutCirc', 'easeInOutElastic', 'easeInOutBack', 'easeInOutBounce');
	}


	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		// Template shortcode verible
		$current_tmpl    = suAsset::currentTmpl();
		$tmpl_path       = JPATH_ROOT .'/templates/'. $current_tmpl;
		$tmpl_shortcodes = glob($tmpl_path.'/html/plg_bdthemes_shortcodes/shortcodes/*');

		$shortcodes = array();

		if (is_array($tmpl_shortcodes)) {
			// Template shortcode grabber
			foreach ($tmpl_shortcodes as $directory_name) {

			    if (strpos($directory_name, " ") == 0) {
				    $ts_config = $directory_name.'/config.php';

				    if (file_exists($ts_config)) {
				    	require_once $ts_config;
				 	    $shortcode_tag = basename($directory_name);
				 	    $shortcode_class = 'Su_Shortcode_'.$shortcode_tag.'_config';
				 	    $shortcodes[$shortcode_tag] = $shortcode_class::get_config();
				    }
				}
			}
		}

		// Core shortcode grabber
	 	foreach (array_filter(glob(BDT_SU_ROOT.'/shortcodes/*'), 'is_dir') as $directory_name) {

			if (strpos($directory_name, " ") == 0) {
				$shortcode_tag = basename($directory_name);

				if(!empty($shortcodes[$shortcode_tag])) {
					continue;
				}

		 	    $filename = $directory_name.'/config.php';
		 	    if (file_exists($filename)) {
		 	    	require_once $filename;
			 	    $shortcode_class = 'Su_Shortcode_'.$shortcode_tag.'_config';
			 	    $shortcodes[$shortcode_tag] = $shortcode_class::get_config();
		 	    }
			}
	 	}

		// Return result
        if($shortcode){
            return $shortcodes[$shortcode];
        }
        else{
			return $shortcodes;
        }
	}
}

class Shortcodes_Ultimate_Data extends Su_Data {
	function __construct() {
		parent::__construct();
	}
}