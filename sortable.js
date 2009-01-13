/**
 * @description Sortable Lists.
 * @module sortablelists
 * @version 0.1
 * @namespace YAHOO.widget
 * @requires yahoo, dom, event
*/
/**
 * @description Sortable Lists.
 * @class SortableList
 * @param {String/HTMLElement} elm The element to convert into a sortable list
 */
YAHOO.widget.SortableList = function(elm, cfg) {
    this.elm = $(elm);
    this.drop = null;
    this.lastTarget = false;
    this._tagName = 'li';

    if (cfg) {
        if (cfg.tagname) {
            this._tagName = cfg.tagname;
        }
    }

    if (!this.elm) {
        return false;
    }
    /**
    * Custom Event
    * @type Object
    */
    this.onInit = new YAHOO.util.CustomEvent('oninit', this);
}
/**
* The init function to make the list sortable
* @method init
* @private
*/
YAHOO.widget.SortableList.prototype.init = function() {
    this._setupList();
    this.onInit.fire();
}
/**
* Sets up the list
* @method _setupList
* @private
*/
YAHOO.widget.SortableList.prototype._setupList = function() {
    this.lis = this.elm.getElementsByTagName(this._tagName);
    $D.generateId(this.lis, 'ysortable');
    for (var i = 0; i < this.lis.length; i++) {
        var ID = this.lis[i].id;
        this.lis[i]._yuiGroup = this.elm.id;
        new YAHOO.util.DDTarget(ID);
        var tmp = new YAHOO.util.DD(ID, this.elm.id);
        tmp.onDragDrop = this.onDragDrop;
        tmp.onDragOver = this.onDragOver;
        tmp.onMouseUp = this.onMouseUp;
        tmp.onDragEnter = this.onDragEnter;
    }
}
/**
* DragEnter event handler
* @method onDragEnter
* @private
*/
YAHOO.widget.SortableList.prototype.onDragEnter = function(ev, id) {
    if (!this.currentDrag) {
        //Find the parent Draggable object
        var tar = $E.getTarget(ev);
        var par = tar;
        if (par) {
            while (par.parentNode) {
                if (typeof par._yuiGroup != "undefined") {
                    this.currentDrag = par;
                    break;
                }
                par = par.parentNode;
            }
        }
    }
}
/**
* onDragDrop Event handler
* @method onDragDrop
* @private
*/
YAHOO.widget.SortableList.prototype.onDragDrop = function(ev, id) {
    var tar = this.currentDrag;
    //Find the parent Draggable object
    var par = $(id);
    var finalParent = par;
    if (par) {
        while (par.parentNode) {
            if (typeof par._yuiGroup != "undefined") {
                finalParent = par;
                break;
            }
            par = par.parentNode;
        }
    }
    var id = finalParent.id;
    if (this.lastTarget && (id === this.lastTarget) && (tar.id != id)) {
        $D.removeClass(this.lastTarget, 'yui-sortover');
        var tmp = $(id);
        if (tmp.previousSibling != tar) {
            tar.parentNode.removeChild(tar);
            tmp.parentNode.insertBefore(tar, tmp);
        } else {
            tar.parentNode.removeChild(tar);
            tmp.parentNode.insertBefore(tar, tmp.nextSibling);
        }
    }
}
/**
* onDragOver Event handler
* @method onDragOver
* @private
*/
YAHOO.widget.SortableList.prototype.onDragOver = function(ev, id) {
    if (this.lastTarget) {
        $D.removeClass(this.lastTarget, 'yui-sortover');
    }
    this.lastTarget = id;
    $D.addClass(id, 'yui-sortover');
}
/**
* onMouseUp Event handler
* @method onMouseUp
* @private
*/
YAHOO.widget.SortableList.prototype.onMouseUp = function(ev) {
    //var tar = $E.getTarget(ev);
    var tar = this.currentDrag;
    this.currentDrag = false;
    if (this.lastTarget) {
        $D.removeClass(this.lastTarget, 'yui-sortover');
    }
    $D.setStyle(tar, 'position', 'static');
    $D.setStyle(tar, 'top', '');
    $D.setStyle(tar, 'left', '');
}
