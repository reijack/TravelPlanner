(() => {
  const sidebar = document.getElementById('sidebar');
  const trigger = document.getElementById('hamburgerBtn');
  const overlay = document.getElementById('sidebarOverlay');
  const main = document.querySelector('.main-wrapper');
  const mobile = matchMedia('(max-width: 900px)');
  let returnFocus = null;
  const focusables = root => [...root.querySelectorAll('a[href],button,input:not([type=hidden]),select,textarea,[tabindex="0"]')].filter(el => !el.disabled && el.getClientRects().length);
  const lockScroll = () => { document.body.style.overflowY = (sidebar?.classList.contains('open') || document.querySelector('.modal-overlay.open')) ? 'hidden' : ''; };
  function setMenu(open, restore = true) {
    if (!sidebar) return;
    sidebar.classList.toggle('open', open);
    overlay.classList.toggle('open', open);
    trigger.setAttribute('aria-expanded', String(open));
    sidebar.inert = mobile.matches && !open;
    main.inert = mobile.matches && open;
    lockScroll();
    if (open) (focusables(sidebar)[0] || sidebar).focus();
    else if (restore) trigger.focus();
  }
  trigger?.addEventListener('click', () => setMenu(!sidebar.classList.contains('open')));
  overlay?.addEventListener('click', () => setMenu(false));
  document.getElementById('sidebarClose')?.addEventListener('click', () => setMenu(false));
  sidebar?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setMenu(false, false)));
  mobile.addEventListener('change', () => setMenu(false, false));
  setMenu(false, false);
  document.querySelectorAll('.nav-item.active').forEach(a => a.setAttribute('aria-current', 'page'));
  // Associate existing form labels without changing field names or submissions.
  document.querySelectorAll('label:not([for])').forEach((label, i) => {
    const field = label.nextElementSibling;
    if (field?.matches('input,select,textarea')) {
      field.id ||= `field-${i}`;
      label.htmlFor = field.id;
    }
  });
  const tabs = [...document.querySelectorAll('.tab-btn')];
  if (tabs.length) {
    tabs[0].parentElement.setAttribute('role', 'tablist');
    tabs[0].parentElement.setAttribute('aria-label', 'Detail perjalanan');
    const syncTabs = () => tabs.forEach(tab => {
      const active = tab.classList.contains('active');
      tab.setAttribute('aria-selected', String(active));
      tab.tabIndex = active ? 0 : -1;
    });
    tabs.forEach((tab, index) => {
      const name = tab.getAttribute('onclick')?.match(/switchTab\('([^']+)'/)?.[1];
      if (!name) return;
      tab.id = `trigger-${name}`;
      tab.setAttribute('role', 'tab');
      tab.setAttribute('aria-controls', `tab-${name}`);
      const panel = document.getElementById(`tab-${name}`);
      panel?.setAttribute('role', 'tabpanel');
      panel?.setAttribute('aria-labelledby', tab.id);
      if (panel) panel.tabIndex = 0;
      tab.addEventListener('click', syncTabs);
      tab.addEventListener('keydown', event => {
        let next;
        if (event.key === 'ArrowRight') next = (index + 1) % tabs.length;
        if (event.key === 'ArrowLeft') next = (index - 1 + tabs.length) % tabs.length;
        if (event.key === 'Home') next = 0;
        if (event.key === 'End') next = tabs.length - 1;
        if (next === undefined) return;
        event.preventDefault(); tabs[next].click(); tabs[next].focus();
      });
    });
    syncTabs();
  }
  document.querySelectorAll('.modal-overlay').forEach((modal, i) => {
    const dialog = modal.querySelector('.modal');
    const heading = modal.querySelector('.modal-title');
    dialog.setAttribute('role', 'dialog');
    dialog.setAttribute('aria-modal', 'true');
    if (heading) { heading.id ||= `dialog-title-${i}`; dialog.setAttribute('aria-labelledby', heading.id); }
    modal.querySelector('.modal-close')?.setAttribute('aria-label', 'Tutup dialog');
    new MutationObserver(() => {
      const open = modal.classList.contains('open');
      if (open) {
        returnFocus = document.activeElement;
        (focusables(modal)[0] || dialog).focus();
      } else { returnFocus?.focus(); }
      lockScroll();
    }).observe(modal, {attributes:true, attributeFilter:['class']});
  });
  document.addEventListener('keydown', event => {
    const modal = document.querySelector('.modal-overlay.open');
    const menu = mobile.matches && sidebar?.classList.contains('open') ? sidebar : null;
    const active = modal || menu;
    if (!active) return;
    if (event.key === 'Escape') {
      if (modal) modal.classList.remove('open'); else setMenu(false);
      return;
    }
    if (event.key !== 'Tab') return;
    const items = focusables(active);
    const first = items[0], last = items.at(-1);
    if (!first) return;
    if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
    else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
  });
})();
