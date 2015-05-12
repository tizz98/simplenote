App = Ember.Application.create({
    LOG_TRANSITIONS: true
});

App.Router.map(function(){
	this.resource('register');
	this.resource('login');
	this.resource('passwordReset', { path: 'password/email' });
});

Ember.LinkView.reopen({
	attributeBindings: ['role']
});

Ember.Router.extend({
  location: 'history'
});
