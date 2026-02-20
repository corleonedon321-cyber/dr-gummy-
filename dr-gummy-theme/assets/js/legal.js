/**
 * Legal & Privacy Page — Tab Switching, Print, PDF Download
 *
 * - Sidebar nav links switch content panels via JS tabs
 * - URL hash support (deep-linking to #privacy, #refund, etc.)
 * - Print current section
 * - Download current section as PDF (via browser print-to-PDF)
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     DOM REFERENCES
     ----------------------------------------------------------- */

  var sidebarLinks = document.querySelectorAll('[data-legal-tab]');
  var panels       = document.querySelectorAll('[data-legal-panel]');

  if (!sidebarLinks.length || !panels.length) return;

  /* -----------------------------------------------------------
     TAB SWITCHING
     ----------------------------------------------------------- */

  function activateTab(slug, pushState) {
    // Update sidebar links
    sidebarLinks.forEach(function (link) {
      if (link.getAttribute('data-legal-tab') === slug) {
        link.classList.add('is-active');
      } else {
        link.classList.remove('is-active');
      }
    });

    // Update panels
    panels.forEach(function (panel) {
      if (panel.getAttribute('data-legal-panel') === slug) {
        panel.classList.add('is-active');
        panel.removeAttribute('hidden');
      } else {
        panel.classList.remove('is-active');
        panel.setAttribute('hidden', '');
      }
    });

    // Update URL hash
    if (pushState && window.history && window.history.replaceState) {
      window.history.replaceState(null, '', '#' + slug);
    }

    // Scroll to top of content on mobile
    if (window.innerWidth <= 768) {
      var contentArea = document.getElementById('legal-content');
      if (contentArea) {
        var navHeight = 80;
        var top = contentArea.getBoundingClientRect().top + window.pageYOffset - navHeight;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    }
  }

  // Click handler for sidebar links
  sidebarLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      var slug = link.getAttribute('data-legal-tab');
      activateTab(slug, true);
    });
  });

  // Hash-based deep linking on load
  function checkHash() {
    var hash = window.location.hash.replace('#', '');
    if (hash) {
      // Verify that this slug exists in our panels
      var matchingPanel = document.querySelector('[data-legal-panel="' + hash + '"]');
      if (matchingPanel) {
        activateTab(hash, false);
        return;
      }
    }
    // Default to first tab
    var firstLink = sidebarLinks[0];
    if (firstLink) {
      activateTab(firstLink.getAttribute('data-legal-tab'), false);
    }
  }

  checkHash();

  // Handle browser back/forward navigation
  window.addEventListener('hashchange', function () {
    checkHash();
  });

  /* -----------------------------------------------------------
     PRINT CURRENT SECTION
     ----------------------------------------------------------- */

  document.addEventListener('click', function (e) {
    var printBtn = e.target.closest('[data-legal-print]');
    if (!printBtn) return;

    window.print();
  });

  /* -----------------------------------------------------------
     DOWNLOAD PDF (uses browser print-to-PDF dialog)
     ----------------------------------------------------------- */

  document.addEventListener('click', function (e) {
    var downloadBtn = e.target.closest('[data-legal-download]');
    if (!downloadBtn) return;

    // Get active panel title for the filename suggestion
    var activePanel = document.querySelector('.legal-panel.is-active');
    var titleEl = activePanel ? activePanel.querySelector('.legal-panel__title') : null;
    var title = titleEl ? titleEl.textContent.trim() : 'Legal Document';

    // Create a print-friendly window with just the content
    var printWindow = window.open('', '_blank', 'width=800,height=600');
    if (!printWindow) {
      // Popup blocked — fall back to regular print
      window.print();
      return;
    }

    var content = activePanel ? activePanel.innerHTML : '';

    // Remove the action buttons from the printed content
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = content;
    var actionsEl = tempDiv.querySelector('.legal-panel__actions');
    if (actionsEl) actionsEl.remove();

    printWindow.document.write(
      '<!DOCTYPE html><html><head>' +
      '<title>Dr. Gummy — ' + title + '</title>' +
      '<style>' +
        'body { font-family: "DM Sans", "Inter", -apple-system, sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; color: #1A1A1A; line-height: 1.6; }' +
        'h1 { font-family: "DM Serif Display", Georgia, serif; font-size: 28px; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 2px solid #E5E7EB; }' +
        'h3 { font-size: 18px; font-weight: 700; margin: 24px 0 8px; }' +
        'p { margin-bottom: 12px; }' +
        'a { color: #5BA4B5; }' +
        'ul { margin: 8px 0 12px 20px; }' +
        'ul li { margin-bottom: 6px; list-style: disc; }' +
        '.legal-panel__section { margin-bottom: 24px; }' +
        '@media print { body { margin: 0; } }' +
      '</style>' +
      '</head><body>' +
      '<p style="font-size:12px;color:#6B7280;margin-bottom:24px;">Dr. Gummy LLC &mdash; drgummy.com</p>' +
      tempDiv.innerHTML +
      '</body></html>'
    );
    printWindow.document.close();

    // Trigger print after content loads
    printWindow.onload = function () {
      printWindow.print();
    };
    // Fallback for browsers that don't fire onload for document.write
    setTimeout(function () {
      printWindow.print();
    }, 500);
  });

  /* -----------------------------------------------------------
     KEYBOARD NAVIGATION — arrow keys in sidebar
     ----------------------------------------------------------- */

  var sidebar = document.getElementById('legal-sidebar');
  if (sidebar) {
    sidebar.addEventListener('keydown', function (e) {
      if (e.key !== 'ArrowDown' && e.key !== 'ArrowUp') return;

      var focusedLink = document.activeElement;
      if (!focusedLink || !focusedLink.matches('[data-legal-tab]')) return;

      e.preventDefault();

      var linksArr = Array.prototype.slice.call(sidebarLinks);
      var currentIdx = linksArr.indexOf(focusedLink);
      var nextIdx;

      if (e.key === 'ArrowDown') {
        nextIdx = (currentIdx + 1) % linksArr.length;
      } else {
        nextIdx = (currentIdx - 1 + linksArr.length) % linksArr.length;
      }

      linksArr[nextIdx].focus();
      activateTab(linksArr[nextIdx].getAttribute('data-legal-tab'), true);
    });
  }

})();
