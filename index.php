<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>YUI: Sortable Nested List Widget</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.2.0/build/reset-fonts-grids/reset-fonts-grids.css"> 
    <link rel="stylesheet" href="http://blog.davglass.com/wp-content/themes/davglass/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://us.js2.yimg.com/us.js.yimg.com/i/ydn/yuiweb/css/dpsyntax-min-11.css">
    <style type="text/css" media="screen">
        @import url( style.css );
	</style>
</head>
<body>
<div id="davdoc" class="yui-t7">
    <div id="hd"><h1 id="header"><a href="http://blog.davglass.com/">YUI: Sortable Nested List Widget</a></h1></div>
    <div id="bd">
    <p><b>Update:</b> There was an issue with elements inside of the draggable objects.. It has now been fixed..</p>
    <p><b>Update:</b> There was an issue with Opera crashing on this demo.. It has now been fixed..</p>
    <p>After posting my last example of Nested Drag Drop Events, I received several emails asking how to create sortable nested lists. So here you are.</p>
    <p>Just drag any of the list items below and when you drop them, it will resort. Also note that you have to drop it on a valid target or it will move back to where it started and you <b>can't</b> drag from one list to the other.</p>
    <p><a href="../docs/?type=sortable">Docs available here</a> - <a href="sortable.js">Full source here</a> - <a href="sortable-min.js">Minimized source here</a></p>

    <div class="yui-g">
        <div class="yui-gb first">
            <div class="yui-u first">
                <h2>Test List #1</h2>
                <div id="droplist">
                    <ul id="sortList">
                        <li><span>Test 1</span></li>
                        <li><span>Test 2</span>
                            <ul>
                                <li><span>Test 2-1</span></li>
                                <li><span>Test 2-2</span></li>
                                <li><span>Test 2-3</span></li>
                                <li><span>Test 2-4</span></li>
                            </ul>
                        </li>
                        <li><span>Test 3</span>
                            <ul>
                                <li><span>Test 3-1</span></li>
                                <li><span>Test 3-2</span></li>
                                <li><span>Test 3-3</span></li>
                                <li><span>Test 3-4</span></li>
                            </ul>
                        </li>
                        <li><span>Test 4</span></li>
                    </ul>
                </div>
            </div>
            <div class="yui-u">
                <h2>Test List #3 (divs)</h2>
                <div id="dropList3">
                    <div><span><strong><em>Content here #1</em></strong></span></div>
                    <div><span><strong><em>Content here #2</em></strong></span></div>
                    <div><span><strong><em>Content here #3</em></strong></span></div>
                    <div><span><strong><em>Content here #4</em></strong></span></div>
                    <div><span><strong><em>Content here #5</em></strong></span></div>
                </div>
            </div>
            <div class="yui-u">
                <h2>Test List #2</h2>
                <div id="droplist2">
                    <ul id="sortList2">
                        <li>Test 1</li>
                        <li>Test 2
                            <ul>
                                <li>Test 2-1</li>
                                <li>Test 2-2</li>
                                <li>Test 2-3</li>
                                <li>Test 2-4</li>
                            </ul>
                        </li>
                        <li>Test 3
                            <ul>
                                <li>Test 3-1</li>
                                <li>Test 3-2</li>
                                <li>Test 3-3</li>
                                <li>Test 3-4</li>
                            </ul>
                        </li>
                        <li>Test 4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h2>The Javascript</h2>
    <textarea name="code" class="JScript">
function init() {
    var myList = new YAHOO.widget.SortableList('sortList');
    myList.init();

    var myList2 = new YAHOO.widget.SortableList('sortList2');
    myList2.init();

    var myList3 = new YAHOO.widget.SortableList('dropList3', { tagname: 'div' });
    myList3.init();
}

YAHOO.util.Event.addListener(window, 'load', init);
    </textarea>
    <h2>The HTML for List #3</h2>
    <textarea name="code" class="HTML">
<h2>Test List #3 (divs)</h2>
<div id="dropList3">
    <div><span><strong><em>Content here #1</em></strong></span></div>
    <div><span><strong><em>Content here #2</em></strong></span></div>
    <div><span><strong><em>Content here #3</em></strong></span></div>
    <div><span><strong><em>Content here #4</em></strong></span></div>
    <div><span><strong><em>Content here #5</em></strong></span></div>
</div>
    </textarea>
</div>
<script type="text/javascript" src="http://yui.yahooapis.com/2.2.0/build/utilities/utilities.js"></script> 
<script type="text/javascript" src="../js/tools-min.js"></script>
<script type="text/javascript" src="../js/effects-min.js"></script>
<script src="http://us.js2.yimg.com/us.js.yimg.com/i/ydn/yuiweb/js/dpsyntax-min-2.js"></script>
<script type="text/javascript" src="../js/davglass.js"></script>

<script type="text/javascript" src="sortable.js"></script>
<script type="text/javascript">

function init() {
    var myList = new YAHOO.widget.SortableList('sortList');
    myList.init();

    var myList2 = new YAHOO.widget.SortableList('sortList2');
    myList2.init();

    var myList3 = new YAHOO.widget.SortableList('dropList3', { tagname: 'div' });
    myList3.init();

    dp.SyntaxHighlighter.HighlightAll('code'); 
}

YAHOO.util.Event.addListener(window, 'load', init);

</script>
</body>
</html>
<?php @include_once($_SERVER["DOCUMENT_ROOT"]."/wp-content/plugins/shortstat/inc.stats.php"); ?>

