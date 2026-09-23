(function () {
  'use strict';

  var API = '/api/ai-assistant.php';
  var state = { csrf: '', sessionId: '', conversation: [], busy: false };

  function el(tag, className, text) {
    var node = document.createElement(tag);
    if (className) node.className = className;
    if (typeof text === 'string') node.textContent = text;
    return node;
  }

  function robotSvg() {
    return '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="7" width="16" height="12" rx="4"></rect><path d="M12 3v4M9 3h6M8.5 12h.01M15.5 12h.01M8 16h8"></path></svg>';
  }

  function sendSvg() {
    return '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 2 11 13"></path><path d="m22 2-7 20-4-9-9-4Z"></path></svg>';
  }

  function buildUi() {
    var launcher = el('button', 'je-ai-launcher');
    launcher.type = 'button';
    launcher.setAttribute('aria-label', 'Open Jaipur Engineers AI Assistant');
    launcher.setAttribute('aria-expanded', 'false');
    launcher.innerHTML = robotSvg() + '<span class="je-ai-launcher-badge">AI</span>';

    var panel = el('section', 'je-ai-panel');
    panel.setAttribute('role', 'dialog');
    panel.setAttribute('aria-label', 'Jaipur Engineers AI Assistant');
    panel.innerHTML =
      '<div class="je-ai-header">' +
        '<div class="je-ai-avatar">' + robotSvg() + '</div>' +
        '<div class="je-ai-header-copy"><strong id="je-ai-name">JE AI Assistant</strong><span><i class="je-ai-status-dot"></i> Local course assistant</span></div>' +
        '<button type="button" class="je-ai-close" aria-label="Close assistant">&times;</button>' +
      '</div>' +
      '<div class="je-ai-body" aria-live="polite"></div>' +
      '<div class="je-ai-inputbar">' +
        '<textarea class="je-ai-input" rows="1" maxlength="1200" placeholder="Ask about courses, batches, internship..."></textarea>' +
        '<button type="button" class="je-ai-send" aria-label="Send message">' + sendSvg() + '</button>' +
      '</div>' +
      '<div class="je-ai-form-wrap" aria-hidden="true">' +
        '<div class="je-ai-form-head"><button type="button" class="je-ai-form-back" aria-label="Back to chat">&#8592;</button><strong>Get a Counsellor Callback</strong></div>' +
        '<div class="je-ai-form-scroll">' +
          '<div class="je-ai-alert"></div>' +
          '<form class="je-ai-lead-form" novalidate>' +
            '<div class="je-ai-form-grid">' +
              '<div class="je-ai-field"><label>Name *</label><input name="name" maxlength="120" required autocomplete="name"></div>' +
              '<div class="je-ai-field"><label>Mobile *</label><input name="mobile" maxlength="30" required inputmode="tel" autocomplete="tel"></div>' +
              '<div class="je-ai-field"><label>Email</label><input type="email" name="email" maxlength="190" autocomplete="email"></div>' +
              '<div class="je-ai-field"><label>Interested Course</label><input name="interested_course" maxlength="190" placeholder="e.g. Full Stack"></div>' +
              '<div class="je-ai-field"><label>Qualification</label><input name="qualification" maxlength="190" placeholder="BCA, BTech, Graduate..."></div>' +
              '<div class="je-ai-field"><label>College</label><input name="college" maxlength="190"></div>' +
              '<div class="je-ai-field"><label>Current Year</label><input name="current_year" maxlength="80" placeholder="1st / 2nd / Final"></div>' +
              '<div class="je-ai-field"><label>City</label><input name="city" maxlength="120" autocomplete="address-level2"></div>' +
              '<div class="je-ai-field"><label>Preferred Branch</label><input name="preferred_branch" maxlength="160" placeholder="Mansarovar / other"></div>' +
              '<div class="je-ai-field"><label>Learning Mode</label><select name="learning_mode"><option value="">Select</option><option>Offline</option><option>Online</option><option>Either</option></select></div>' +
              '<div class="je-ai-field"><label>Preferred Batch</label><input name="preferred_batch" maxlength="120" placeholder="Morning / Evening / Weekend"></div>' +
              '<div class="je-ai-field full"><label>Question / Message</label><textarea name="message" maxlength="2000" placeholder="What would you like to know?"></textarea></div>' +
              '<div class="je-ai-honeypot" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div>' +
            '</div>' +
            '<button class="je-ai-submit" type="submit">Save Enquiry & Request Callback</button>' +
            '<p class="je-ai-form-note">By submitting, you allow Jaipur Engineers to contact you about your enquiry. Current fees and batch availability are confirmed by the counselling team.</p>' +
          '</form>' +
        '</div>' +
      '</div>';

    document.body.appendChild(launcher);
    document.body.appendChild(panel);

    return {
      launcher: launcher,
      panel: panel,
      close: panel.querySelector('.je-ai-close'),
      body: panel.querySelector('.je-ai-body'),
      input: panel.querySelector('.je-ai-input'),
      send: panel.querySelector('.je-ai-send'),
      name: panel.querySelector('#je-ai-name'),
      formWrap: panel.querySelector('.je-ai-form-wrap'),
      formBack: panel.querySelector('.je-ai-form-back'),
      form: panel.querySelector('.je-ai-lead-form'),
      formAlert: panel.querySelector('.je-ai-alert'),
      submit: panel.querySelector('.je-ai-submit')
    };
  }

  var ui;

  function scrollBottom() {
    window.requestAnimationFrame(function () {
      ui.body.scrollTop = ui.body.scrollHeight;
    });
  }

  function addMessage(role, text, links, remember) {
    var row = el('div', 'je-ai-message ' + role);
    var bubble = el('div', 'je-ai-bubble', text || '');
    row.appendChild(bubble);

    if (links && links.length) {
      var linkWrap = el('div', 'je-ai-links');
      links.slice(0, 6).forEach(function (item) {
        if (!item || !item.url || !item.label) return;
        var a = el('a', '', String(item.label));
        a.href = String(item.url);
        linkWrap.appendChild(a);
      });
      bubble.appendChild(linkWrap);
    }

    ui.body.appendChild(row);
    if (remember !== false) {
      state.conversation.push({ role: role === 'assistant' ? 'assistant' : 'user', text: String(text || '').slice(0, 1200) });
      if (state.conversation.length > 60) state.conversation = state.conversation.slice(-60);
    }
    scrollBottom();
    return row;
  }

  function addTyping() {
    var row = el('div', 'je-ai-message assistant je-ai-typing-row');
    var bubble = el('div', 'je-ai-bubble');
    bubble.innerHTML = '<span class="je-ai-typing"><i></i><i></i><i></i></span>';
    row.appendChild(bubble);
    ui.body.appendChild(row);
    scrollBottom();
    return row;
  }

  function addCallbackButton() {
    if (ui.body.querySelector('.je-ai-callback')) return;
    var btn = el('button', 'je-ai-callback', 'Get a Counsellor Callback');
    btn.type = 'button';
    btn.addEventListener('click', openLeadForm);
    ui.body.appendChild(btn);
    scrollBottom();
  }

  function renderChoices(title, values, className) {
    if (!values || !values.length) return;
    var label = el('div', 'je-ai-section-label', title);
    var wrap = el('div', className || 'je-ai-popular');
    values.forEach(function (value) {
      var btn = el('button', 'je-ai-chip', String(value));
      btn.type = 'button';
      btn.addEventListener('click', function () { sendQuestion(String(value)); });
      wrap.appendChild(btn);
    });
    ui.body.appendChild(label);
    ui.body.appendChild(wrap);
  }

  function setBusy(flag) {
    state.busy = flag;
    ui.send.disabled = flag;
    ui.input.disabled = flag;
  }

  function post(payload) {
    payload.csrf = state.csrf;
    return fetch(API, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      credentials: 'same-origin',
      body: JSON.stringify(payload)
    }).then(function (res) {
      return res.json().catch(function () { return {}; }).then(function (json) {
        if (!res.ok || json.ok === false) throw new Error(json.message || 'Request failed.');
        return json;
      });
    });
  }

  function sendQuestion(text) {
    text = String(text || ui.input.value || '').trim();
    if (!text || state.busy) return;
    ui.input.value = '';
    addMessage('user', text);
    setBusy(true);
    var typing = addTyping();

    post({ action: 'message', message: text })
      .then(function (data) {
        typing.remove();
        addMessage('assistant', data.answer || 'Please try a suggested question.', data.links || []);
        if (data.capture_lead) addCallbackButton();
      })
      .catch(function (err) {
        typing.remove();
        addMessage('assistant', err.message || 'The assistant is temporarily unavailable. You can still request a callback.');
        addCallbackButton();
      })
      .finally(function () {
        setBusy(false);
        ui.input.focus();
      });
  }

  function inferCourse() {
    var path = location.pathname.toLowerCase();
    if (path.indexOf('course') === -1) return '';
    var h1 = document.querySelector('h1');
    return h1 ? String(h1.textContent || '').trim().slice(0, 190) : '';
  }

  function openLeadForm() {
    ui.formWrap.classList.add('open');
    ui.formWrap.setAttribute('aria-hidden', 'false');
    var course = ui.form.elements.interested_course;
    if (course && !course.value) course.value = inferCourse();
    var message = ui.form.elements.message;
    if (message && !message.value && state.conversation.length) {
      var lastUser = state.conversation.filter(function (m) { return m.role === 'user'; }).pop();
      if (lastUser) message.value = lastUser.text.slice(0, 2000);
    }
    var first = ui.form.elements.name;
    if (first) first.focus();
  }

  function closeLeadForm() {
    ui.formWrap.classList.remove('open');
    ui.formWrap.setAttribute('aria-hidden', 'true');
    ui.input.focus();
  }

  function showFormAlert(type, message) {
    ui.formAlert.className = 'je-ai-alert show ' + type;
    ui.formAlert.textContent = message;
  }

  function formPayload() {
    var fd = new FormData(ui.form);
    var data = { action: 'lead' };
    fd.forEach(function (value, key) { data[key] = String(value || '').trim(); });
    var params = new URLSearchParams(location.search);
    data.page_url = location.href;
    data.referrer = document.referrer || '';
    data.utm_source = params.get('utm_source') || '';
    data.utm_medium = params.get('utm_medium') || '';
    data.utm_campaign = params.get('utm_campaign') || '';
    data.utm_term = params.get('utm_term') || '';
    data.utm_content = params.get('utm_content') || '';
    data.device = navigator.userAgent || '';
    data.conversation = state.conversation.slice(-60);
    return data;
  }

  function submitLead(event) {
    event.preventDefault();
    if (ui.submit.disabled) return;
    var data = formPayload();
    if (!data.name || !data.mobile) {
      showFormAlert('error', 'Please enter your name and mobile number.');
      return;
    }
    ui.submit.disabled = true;
    ui.submit.textContent = 'Saving...';
    ui.formAlert.className = 'je-ai-alert';

    post(data)
      .then(function (response) {
        showFormAlert('success', response.message || 'Your enquiry has been saved.');
        addMessage('assistant', 'Your callback request has been saved. Our counselling team can follow up using the details you shared.');
        ui.form.reset();
        window.setTimeout(closeLeadForm, 1100);
      })
      .catch(function (err) {
        showFormAlert('error', err.message || 'Could not save your enquiry. Please try again.');
      })
      .finally(function () {
        ui.submit.disabled = false;
        ui.submit.textContent = 'Save Enquiry & Request Callback';
      });
  }

  function openPanel() {
    ui.panel.classList.add('je-ai-open');
    ui.launcher.setAttribute('aria-expanded', 'true');
    window.setTimeout(function () { ui.input.focus(); }, 80);
  }

  function closePanel() {
    ui.panel.classList.remove('je-ai-open');
    ui.launcher.setAttribute('aria-expanded', 'false');
    closeLeadForm();
    ui.launcher.focus();
  }

  function bootstrap() {
    fetch(API, { headers: { 'Accept': 'application/json' }, credentials: 'same-origin' })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        state.csrf = data.csrf || '';
        state.sessionId = data.session_id || '';
        if (data.assistant_name) ui.name.textContent = data.assistant_name;
        addMessage('assistant', data.welcome || 'Hi! How can I help you?', [], true);
        renderChoices('Quick help', data.quick_actions || [], 'je-ai-quick');
        renderChoices('Popular questions', data.popular_questions || [], 'je-ai-popular');
        addCallbackButton();
      })
      .catch(function () {
        addMessage('assistant', 'Hi! I can help with Jaipur Engineers courses and enquiries. The local assistant service is temporarily unavailable, but you can still use the contact page.');
        addCallbackButton();
      });
  }

  function init() {
    if (document.querySelector('.je-ai-launcher')) return;
    ui = buildUi();
    ui.launcher.addEventListener('click', function () {
      if (ui.panel.classList.contains('je-ai-open')) closePanel(); else openPanel();
    });
    ui.close.addEventListener('click', closePanel);
    ui.formBack.addEventListener('click', closeLeadForm);
    ui.send.addEventListener('click', function () { sendQuestion(); });
    ui.input.addEventListener('keydown', function (event) {
      if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendQuestion();
      }
    });
    ui.form.addEventListener('submit', submitLead);
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && ui.panel.classList.contains('je-ai-open')) closePanel();
    });
    bootstrap();
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
