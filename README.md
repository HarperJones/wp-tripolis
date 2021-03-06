WP-Tripolis Plugin
==================

##Introduction##
This is a Wordpress plugin which will allow you to add (only at the moment) users to the Tripolis database
without having to do much programming. This plugin has a partial implementation of the Tripolis API (version
2.0).

##Prerequisits##
To use this plugin you need to have an active Tripolis Dialogue license, and your environment should have
an API user who at the minimum has access to:

 - Modules
	 - Contact
 - At least one database
 - At least one workspace

Also make sure your use is a "Clientdomain Administrator" as that seems to be required in order to use the API. Don't
make the user an Interactive user as that will require the user to change his/her password every 60 days.

##Setup##
Download and install the plugin in whatever way you are used to and activate the plugin from your plugins page.

After activation you should have a new Settings page where you need to fill in the API user credentials. The information
you need to enter you should have ready. If you do not know the server, check the URL of your license login. It should
match what you see there. If your environment is not in the option list, contact me.

Once the setup has been completed it will, you may start using the shortcode. To help you create a shortcode, use the
shortcode generator tool found under the "Tools" menu.

##Customization##
Once installed you will probably want to do some customization. Hopefully a bit of CSS TLC will help you a long way, but
in case it does not, here are some helpers to get you started.

###Generate custom HTML###
You can override all templating done by creating a directory wp-tripolis in your theme directory and place all files there.
To give you a head start you can copy the templates from the templates directory.

###Customization filters###
**Subscribe Form**

There are a couple of filters you can use to manipulate the fields of the subscribe form. All filters will pass 2 parameters, the value
and a field definition.

* **wp-tripolis_classes**: allows you to add/remove classes from a field/label
* **wp-tripolis_label**: allows you to override the label with your own text
* **wp-tripolis_value**: allows you to set default values for fields (e.g. pre-fill with user info)
* **wp-tripolis_required**: modify which field are mandatory
* **wp-tripolis_subscribe-submit-label**: modify which label of the submit button

Furthermore you can use the following 2 actions to add extra content/before or after the form:

* wptripolis_before_subscribe_form
* wptripolis_after_subscribe_form

You have also two actions you can use to handle confirmation mail sending
* wptripolis/subscribe/mailsent
* wptripolis/subscribe/mailnotsent

And you can use the action `wptripolis/subscribe` to add extra functionality after someone subscribed.


**Unsubscribe Form**

There are a couple of filters & actions you can use to manipulate the unsubscribe form. You can also take the standard
unsubscribe page and copy it to your theme folder and customize it there. Just be sure to add the nonce and use the
wptripolis_field_name() method to style your form.

The filters you can use are:

* **wp-tripolis_unsubscribe-submit-label**: Modify the text of the submit button
* **wp-tripolis_group-label**: Modify the label of a group
* **wptripolis_unsubscribe_introduction**: Alters the heading text

The actions that are available allow you to add content before or after the form. They are:

* wptripolis_before_unsubscribe_form
* wptripolis_before_unsubscribe_form


