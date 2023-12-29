'use strict';

const PopupBox = function(selector, options, element) {

  let default_options = {
    block_page: false,
    open_popup: 'click',
    open_delay: '0',
    open_distance: '0',
    open_popupTrigger: 'ds-open-popup-1',
    close_popupTrigger: 'ds-close-popup',
    auto_closePopup: false,
    auto_closeDelay: '0',
    redirect_onClose: false,
    redirect_URL: '',
    redirect_target: '_blank',
    cookie_enable: false,
    cookie_name: 'ds-popup-1',
    cookie_days: '30',

    // Overlay
    overlay_closesPopup: true,
    overlay_isVisible: true,
    overlay_animation: 'fadeIn',
    overlay_css: {
      'background': 'rgba(0, 0, 0, .75)',
    },

    // Popup
    popup_zindex: '999',
    popup_esc: true,
    popup_animation: 'fadeIn',
    popup_position: '-center',
    popup_css: {
      'width': '550px',
      'height': 'auto',
      'padding': '15px',
      'background': '#ffffff',
    },
    content_css: {
      'padding': '15px',
    },

    // Close Button
    close_isVisible: true,
    close_outer: false,
    close_position: '-topRight',
    close_type: '-text',
    close_content: 'Close',
    close_css: {
      'font-size': '12px',
      'color': '#000000',
    },

    // Mobile
    mobile_show: true,
    mobile_breakpoint: '480px',
    mobile_css: {
      'width': '100%',
    },

    // YooTube video
    video_enable: false,
    video_autoPlay: true,
    video_onClose: true,

  };
  let settings = Object.assign(default_options, options);
  let prefix = 'ds-popup';
  let self = element;
  let popup = self.querySelector('.' + prefix + '-wrapper');
  let content = self.querySelector('.' + prefix + '-content');
  let overlay = createOverlay();
  let close = createCloseBtn();
  let video = videoHosting();

  function objConvert(obj) {
    let str = '';
    for (let key in obj) {
      str += key + ':' + obj[key]+';';
    }
    return str;
  }

  function createOverlay() {
    if (!settings.overlay_isVisible) {
      return false;
    }
    let div = document.createElement('div');
    div.className = prefix + '-overlay fadeIn';
    self.prepend(div);
    return self.querySelector('.' + prefix + '-overlay');
  }

  function createCloseBtn() {
    if (!settings.close_isVisible) {
      return false;
    }
    let div = document.createElement('div');
    div.className = prefix + '-close';
    popup.prepend(div);
    return popup.querySelector('.' + prefix + '-close');
  }

  function videoHosting() {
    let youtube = self.querySelector('iframe[src*="youtube.com"]');
    let vimeo = self.querySelector('iframe[src*="vimeo.com"]');
    if (youtube) {
      return youtube;
    } else if (vimeo) {
      return vimeo;
    } else {
      return false;
    }
  }

  function setStyles() {
    overlayStyle();
    contentStyle();
    popupStyle();
    closeStyle();
  }

  function overlayStyle() {
    if (!overlay) {
      return;
    }
    overlay.style.cssText = 'z-index:' + (settings.popup_zindex - 3) + ';' + objConvert(settings.overlay_css);
    overlay.setAttribute('data-ds-effect', settings.overlay_animation);
  }

  function contentStyle() {
    if (!content) {
      return;
    }
    content.style.cssText = 'z-index:' + (settings.popup_zindex - 1) + ';' + objConvert(settings.content_css);
  }

  function popupStyle() {
    if (!popup) {
      return;
    }
    popup.style.cssText = 'z-index:' + (settings.popup_zindex - 2) + ';' + objConvert(settings.popup_css);
    popup.classList.add(settings.popup_position);
    popup.setAttribute('data-ds-effect', settings.popup_animation);
    let isMobile = window.screen.width <= parseInt(settings.mobile_breakpoint);
    if (isMobile) {
      popup.style.cssText += objConvert(settings.mobile_css);
    }
    fixedPopupStyle();
  }

  function fixedPopupStyle() {
    let style = getComputedStyle(popup);
    let height = style.height;
    let width = style.width;

    if (height === 'auto') {
      popup.style.display = 'block';
      let popup_height = popup.offsetHeight;
      popup.style.display = '';
      popup.style.height = popup_height + 'px';
    }

    if (width === 'auto') {
      popup.style.display = 'block';
      let popup_width = popup.offsetWidth;
      popup.style.display = '';
      popup.style.width = popup_width + 'px';
    }

    switch (settings.popup_position) {
      case '-center':
        popup.style.bottom = '0';
        popup.style.right = '0';
        break;
      case '-bottomCenter':
      case '-topCenter' :
        popup.style.right = '0';
        break;
    }

  }

  function closeStyle() {
    if (!close) {
      return;
    }
    close.classList.add(settings.close_position, settings.close_type);
    close.style.cssText = 'z-index:' + settings.popup_zindex + ';' + objConvert(settings.close_css);
    close.setAttribute('data-ds-close-text', settings.close_content);
    if (settings.close_outer) {
      close.classList.add('-outer');
    }
    if (settings.close_type === '-tag' || settings.close_type === '-icon') {
      let fontSize = close.style.fontSize;
      let box = parseInt(fontSize) + 5;
      let box_style = {
        'width': box + 'px',
        'height': box + 'px',
        'line-height': box + 'px',
      };
      close.style.cssText += objConvert(box_style);
    }
  }

  function openPopupActions() {
    let action = settings.open_popup;
    switch (action) {
      case 'click':
        clickOpenAction();
        break;
      case 'hover':
        hoverOpenAction();
        break;
      case 'auto':
        autoOpenAction();
        break;
      case 'scrolled':
        scrolledOpenAction();
        break;
      case 'rightclick':
        rightClickOpenAction();
        break;
      case 'selected':
        selectedOpenAction();
        break;
      case 'exit':
        exitOpenAction();
        break;
    }
  }

  function clickOpenAction() {
    let trigger = settings.open_popupTrigger;
    let triggers = document.querySelectorAll('.' + trigger + ', a[href$="' + trigger + '"]');
    triggers.forEach((e) => {
      e.addEventListener('click', (event) => {
        event.preventDefault();
        openPopup();
      });
    });
  }

  function hoverOpenAction() {
    let trigger = settings.open_popupTrigger;
    let triggers = document.querySelectorAll('.' + trigger + ', a[href$="' + trigger + '"]');
    triggers.forEach((e) => {
      e.addEventListener('mouseover', (event) => {
        event.preventDefault();
        openPopup();
      });
    });
  }

  function autoOpenAction() {
    setTimeout(function() {
      openPopup();
    }, settings.open_delay * 1000);
  }

  function scrolledOpenAction() {
    let ticking = false;
    window.addEventListener('scroll', function(e) {
      let scrollTop = window.scrollY;
      let docHeight = document.body.clientHeight;
      let winHeight = window.innerHeight;
      let scrollPercent = (scrollTop) / (docHeight - winHeight);
      let scrollPercentRounded = Math.round(scrollPercent * 100);
      if (scrollPercentRounded >= settings.open_distance) {
        if (!ticking) {
          openPopup();
          ticking = true;
        }
      }
    });
  }

  function rightClickOpenAction() {
    document.addEventListener('contextmenu', function(e) {
      openPopup();
      return false;
    });
  }

  function selectedOpenAction() {
    document.addEventListener('mouseup', function(e) {
      let selected_text = ((window.getSelection && window.getSelection()) ||
          (document.getSelection && document.getSelection()) ||
          (document.selection && document.selection.createRange && document.selection.createRange().text));
      if (selected_text.toString().length > 2) {
        openPopup();
      }
    });
  }

  function exitOpenAction() {
    let ticking = false;
    document.addEventListener('mouseleave', function(e) {
      if (e.clientY < 0 && !ticking) {
        openPopup();
        ticking = true;
      }
    });
  }

  function openPopup() {
    if (hideOnMobile() === false) {
      return;
    }
    if (getCookie(settings.cookie_name) && settings.cookie_enable) {
      return;
    }
    self.classList.add('ds-active');
    if(overlay) {
      overlay.style.display = 'block';
    }
    popup.style.display = 'block';
    if (settings.block_page) {
      let page = document.querySelectorAll('html, body');
      page.forEach((el) => {
        el.classList.add('no-scroll');
      });
    }
    videoAutoPlay();
    autoClosePopup();
  }

  // Youtube video auto play
  function videoAutoPlay() {
    if (!settings.video_enable || !settings.video_autoPlay || !video) {
      return;
    }
    let videoURL = video.getAttribute('src');
    video.setAttribute('src', videoURL + '?autoplay=1');
  }

  // Youtube video stop
  function videoStop() {
    if (!settings.video_enable || !settings.video_autoPlay || !video) {
      return;
    }
    let videoURL = video.getAttribute('src');
    videoURL = videoURL.split('?')[0];
    video.setAttribute('src', videoURL + '?autoplay=0');
  }

  function hideOnMobile() {
    if (!settings.mobile_show) {
      let isMobile = window.screen.width <= parseInt(settings.mobile_breakpoint);
      if (isMobile) {
        return false;
      }
    }
  }

  function closePopupActions() {
    clickCloseAction();
    closePopupESC();
    closePopupOverlay();
    if(close) {
      close.addEventListener('click', () => {
        closePopup();
      });
    }
  }

  function autoClosePopup() {
    if (!settings.auto_closePopup) {
      return;
    }
    setTimeout(function() {
      closePopup();
    }, settings.auto_closeDelay * 1000);
  }

  function clickCloseAction() {
    let closeBtn = self.querySelector('.' + settings.close_popupTrigger);
    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        closePopup();
      });
    }
  }

  function closePopupESC() {
    if (!settings.popup_esc) {
      return;
    }
    window.addEventListener('keydown', function(event) {
      if (event.key === 'Escape' || event.key === 'Esc') {
        closePopup();
      }
    });
  }

  function closePopupOverlay() {
    if (!settings.overlay_closesPopup || !overlay) {
      return;
    }
    overlay.addEventListener('click', function() {
      closePopup();
    });
  }

  function closePopup() {
    setCookie();
    self.classList.remove('ds-active');
    videoStop();
    setTimeout(function() {
      if(overlay) {
        overlay.style.display = '';
      }
      popup.style.display = '';
    }, 600);
    let page = document.querySelectorAll('html, body');
    page.forEach((el) => {
      el.classList.remove('no-scroll');
    });
    redirectOnClose();
  }

  function redirectOnClose() {
    if (!settings.redirect_onClose) {
      return;
    }
    let redirectUrl = settings.redirect_URL;
    if (redirectUrl !== '' && redirectUrl.indexOf('http') > -1) {
      window.open(redirectUrl, settings.redirect_target);
    }
  }

  function setCookie() {
    if (!settings.cookie_enable) {
      return;
    }
    const days = settings.cookie_days;
    const now = new Date();
    const ttl = days * 24 * 60 * 60 * 1000;
    const item = {
      value: 'yes',
      expiry: now.getTime() + ttl,
    };
    localStorage.setItem(settings.cookie_name, JSON.stringify(item));

  }

  function getCookie(key) {
    const itemStr = localStorage.getItem(key);

    if (!itemStr) {
      return false;
    }
    const item = JSON.parse(itemStr);
    const now = new Date();

    if (now.getTime() > item.expiry) {
      localStorage.removeItem(key);
      return false;
    }
    return true;
  }

  function popupRun() {
    setStyles();
    openPopupActions();
    closePopupActions();
  }

  return popupRun();

};

document.addEventListener('DOMContentLoaded', function() {
  for (let key in window) {
    if (key.indexOf('PopupBox_') >= 0) {
      let val = window[key];
      let elements = document.querySelectorAll(val.selector);
      elements.forEach((element) => {
        new PopupBox(val.selector, val, element);
      });
    }
  }
});