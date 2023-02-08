/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/sidebar.js ***!
  \*********************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
var ANIMATION_DURATION = 300;
var SIDEBAR_EL = document.getElementById("sidebar");
var SUB_MENU_ELS = document.querySelectorAll(".menu > ul > .menu-item.sub-menu");
var FIRST_SUB_MENUS_BTN = document.querySelectorAll(".menu > ul > .menu-item.sub-menu > a");
var INNER_SUB_MENUS_BTN = document.querySelectorAll(".menu > ul > .menu-item.sub-menu .menu-item.sub-menu > a");
var PopperObject = /*#__PURE__*/function () {
  function PopperObject(reference, popperTarget) {
    _classCallCheck(this, PopperObject);
    _defineProperty(this, "instance", null);
    _defineProperty(this, "reference", null);
    _defineProperty(this, "popperTarget", null);
    this.init(reference, popperTarget);
  }
  _createClass(PopperObject, [{
    key: "init",
    value: function init(reference, popperTarget) {
      var _this = this;
      this.reference = reference;
      this.popperTarget = popperTarget;
      this.instance = Popper.createPopper(this.reference, this.popperTarget, {
        placement: "right",
        strategy: "fixed",
        resize: true,
        modifiers: [{
          name: "computeStyles",
          options: {
            adaptive: false
          }
        }, {
          name: "flip",
          options: {
            fallbackPlacements: ["left", "right"]
          }
        }]
      });
      document.addEventListener("click", function (e) {
        return _this.clicker(e, _this.popperTarget, _this.reference);
      }, false);
      var ro = new ResizeObserver(function () {
        _this.instance.update();
      });
      ro.observe(this.popperTarget);
      ro.observe(this.reference);
    }
  }, {
    key: "clicker",
    value: function clicker(event, popperTarget, reference) {
      if (SIDEBAR_EL.classList.contains("collapsed") && !popperTarget.contains(event.target) && !reference.contains(event.target)) {
        this.hide();
      }
    }
  }, {
    key: "hide",
    value: function hide() {
      this.instance.state.elements.popper.style.visibility = "hidden";
    }
  }]);
  return PopperObject;
}();
var Poppers = /*#__PURE__*/function () {
  function Poppers() {
    _classCallCheck(this, Poppers);
    _defineProperty(this, "subMenuPoppers", []);
    this.init();
  }
  _createClass(Poppers, [{
    key: "init",
    value: function init() {
      var _this2 = this;
      SUB_MENU_ELS.forEach(function (element) {
        _this2.subMenuPoppers.push(new PopperObject(element, element.lastElementChild));
        _this2.closePoppers();
      });
    }
  }, {
    key: "togglePopper",
    value: function togglePopper(target) {
      if (window.getComputedStyle(target).visibility === "hidden") target.style.visibility = "visible";else target.style.visibility = "hidden";
    }
  }, {
    key: "updatePoppers",
    value: function updatePoppers() {
      this.subMenuPoppers.forEach(function (element) {
        element.instance.state.elements.popper.style.display = "none";
        element.instance.update();
      });
    }
  }, {
    key: "closePoppers",
    value: function closePoppers() {
      this.subMenuPoppers.forEach(function (element) {
        element.hide();
      });
    }
  }]);
  return Poppers;
}();
var slideUp = function slideUp(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ANIMATION_DURATION;
  var parentElement = target.parentElement;
  parentElement.classList.remove("open");
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = "".concat(duration, "ms");
  target.style.boxSizing = "border-box";
  target.style.height = "".concat(target.offsetHeight, "px");
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(function () {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};
var slideDown = function slideDown(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ANIMATION_DURATION;
  var parentElement = target.parentElement;
  parentElement.classList.add("open");
  target.style.removeProperty("display");
  var _window$getComputedSt = window.getComputedStyle(target),
    display = _window$getComputedSt.display;
  if (display === "none") display = "block";
  target.style.display = display;
  var height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = "".concat(duration, "ms");
  target.style.height = "".concat(height, "px");
  target.style.removeProperty("padding-top");
  target.style.removeProperty("padding-bottom");
  target.style.removeProperty("margin-top");
  target.style.removeProperty("margin-bottom");
  window.setTimeout(function () {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};
var slideToggle = function slideToggle(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ANIMATION_DURATION;
  if (window.getComputedStyle(target).display === "none") return slideDown(target, duration);
  return slideUp(target, duration);
};
var PoppersInstance = new Poppers();

/**
 * wait for the current animation to finish and update poppers position
 */
var updatePoppersTimeout = function updatePoppersTimeout() {
  setTimeout(function () {
    PoppersInstance.updatePoppers();
  }, ANIMATION_DURATION);
};

/**
 * sidebar collapse handler
 */
document.getElementById("btn-collapse").addEventListener("click", function () {
  SIDEBAR_EL.classList.toggle("collapsed");
  PoppersInstance.closePoppers();
  if (SIDEBAR_EL.classList.contains("collapsed")) FIRST_SUB_MENUS_BTN.forEach(function (element) {
    element.parentElement.classList.remove("open");
  });
  updatePoppersTimeout();
});

/**
 * sidebar toggle handler (on break point )
 */
document.getElementById("btn-toggle").addEventListener("click", function () {
  SIDEBAR_EL.classList.toggle("toggled");
  updatePoppersTimeout();
});

/**
 * toggle sidebar on overlay click
 */
document.getElementById("overlay").addEventListener("click", function () {
  SIDEBAR_EL.classList.toggle("toggled");
});
var defaultOpenMenus = document.querySelectorAll(".menu-item.sub-menu.open");
defaultOpenMenus.forEach(function (element) {
  element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
FIRST_SUB_MENUS_BTN.forEach(function (element) {
  element.addEventListener("click", function () {
    if (SIDEBAR_EL.classList.contains("collapsed")) PoppersInstance.togglePopper(element.nextElementSibling);else {
      var parentMenu = element.closest(".menu.open-current-submenu");
      if (parentMenu) parentMenu.querySelectorAll(":scope > ul > .menu-item.sub-menu > a").forEach(function (el) {
        return window.getComputedStyle(el.nextElementSibling).display !== "none" && slideUp(el.nextElementSibling);
      });
      slideToggle(element.nextElementSibling);
    }
  });
});

/**
 * handle inner submenu click
 */
INNER_SUB_MENUS_BTN.forEach(function (element) {
  element.addEventListener("click", function () {
    slideToggle(element.nextElementSibling);
  });
});



/******/ })()
;