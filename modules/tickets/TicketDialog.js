/** 
 * Copyright Intermesh
 * 
 * This file is part of Group-Office. You should have received a copy of the
 * Group-Office license along with Group-Office. See the file /LICENSE.TXT
 * 
 * If you have questions write an e-mail to info@intermesh.nl
 * 
 * @version $Id: TicketDialog.js 22937 2018-01-12 08:01:19Z mschering $
 * @copyright Copyright Intermesh
 * @author Merijn Schering <mschering@intermesh.nl>
 */
 
GO.tickets.TicketDialog = Ext.extend(GO.dialog.TabbedFormDialog , {
	
	customFieldType : "GO\\Tickets\\Model\\Ticket",
	
	initComponent : function(){
		Ext.apply(this, {
			fileUpload:true,
			titleField:'subject',
			goDialogId:'ticket',
			minWidth:800,
			width:800,
			minHeight:600,
			height:600,
			customFieldType: 'Ticket',
			modal:true,
			title:t("Ticket", "tickets"),
			formControllerUrl: 'tickets/ticket',
			buttonAlign:'left',
			buttons : [
				this.createLinkButton = new go.links.CreateLinkButton(),
				'->',{
					text : t("Save"),
					iconCls: 'ic-done',
					handler : function() {
						this.submitForm(true);
					},
					scope : this
				}]
		});

		this.on("hide", function() {
			this.createLinkButton.reset();
		}, this);
		this.on("save", function(dlg, remoteModelId) {
			this.createLinkButton.setEntity("Ticket", remoteModelId);
			this.createLinkButton.save();
		}, this);

		GO.tickets.TicketDialog.superclass.initComponent.call(this);
	},
	
	buildTicketGroupSelect: function(){
		
		var ticketGroupStore = new GO.data.JsonStore({
			url: GO.url('tickets/ticketGroup/store'),
			remoteSort: true,
			fields: ['id','name'],
			autoLoad: true,
			listeners: {
				load : function (store, records, options) {
					if(GO.util.empty(this.selectTicketGroup.getValue())){
						if (records.length>0)
							this.selectTicketGroup.setValue(records[0].data.id);
						else
							this.selectTicketGroup.setValue('');
					}else
					{
						this.selectTicketGroup.setValue(this.selectTicketGroup.getValue());
					}
					
					this.selectTicketGroup.setDisabled(!records.length);
				},
				scope: this
			}
		});
		ticketGroupStore.setDefaultSort('name', 'asc');
		
		this.selectTicketGroup = new GO.form.ComboBox({
			displayField : 'name',
			valueField : 'id',
			hiddenName : 'group_id',
			store : ticketGroupStore,
			triggerAction : 'all',
			selectOnFocus : true,
			emptyText:t("N/A"),
			pageSize : parseInt(GO.settings['max_rows_list']),
			fieldLabel : t("Ticket group", "tickets"),
			name:'group_id',
			mode: 'remote'
		});
	},
	
	buildCustomerFieldSet : function(){
		if(go.Modules.isAvailable("community", "addressbook")){
			this.selectContact = new go.modules.community.addressbook.ContactCombo({					
				name: 'contact_name',
				anchor: '-20',
				fieldLabel:t("Contact", "tickets"),
				remoteSort: true,
				isOrganization: false
			});
			
			this.selectContact.on('select', function(combo, record)
			{
				var contact = record.json;

				this.contact_id = this.formPanel.baseParams.contact_id=contact.id;

				var values = {
					first_name: contact.firstName,
					middle_name: contact.middleName,
					last_name: contact.lastName
				};

				var email = '';
				if (contact.emailAddresses.length)
					email = contact.emailAddresses[0].email;

				values.email=email;

				var phone = '';
				if (contact.phoneNumbers.length)
					phone = contact.phoneNumbers[0].number;

				values.phone = phone;

				if (contact.id)
					this.selectTicketGroup.store.baseParams['contact_id'] = contact.id;

				if(contact.organizationIds[0])
					this.setCompanyId(contact.organizationIds[0]);


				this.formPanel.form.setValues(values);

			}, this);

		} else {
			this.selectContact = new Ext.form.TextField({
				name:'contact_name',
				fieldLabel:t("Contact"),
				disabled:true
			});
		}
		
		
		if(go.Modules.isAvailable("community", "addressbook")) {
			this.selectCompany = new go.modules.community.addressbook.ContactCombo({
					isOrganization: true,
					hiddenName:'company_id',
					fieldLabel:t("Company"),
					name:'company',
					remoteSort: true,
					listeners:{
						scope:this,
						select:function(combo, record){
							this.formPanel.baseParams.company_id=record.data.id;
						}
					}
				});
			// If the company changes, the ticket group store and the rates store
			// change too.
			this.selectCompany.on('change',function(combo,newValue){
				this.setCompanyId(newValue);
			
			},this);
			
		} else {
			this.selectCompany = new Ext.form.TextField({
				name:'company',
				fieldLabel:t("Company"),
				readOnly: true,
				disabled:true
			});
		}
		this.first_name = new Ext.form.TextField({
			name:'first_name',
			fieldLabel: t("First name"),
			allowBlank:false
		});
		this.middle_name = new Ext.form.TextField({
			name:'middle_name',
			fieldLabel: t("Middle name")
		});
		this.last_name = new Ext.form.TextField({
			name:'last_name',
			fieldLabel: t("Last name"),
			allowBlank:true
		});
		this.phone = new Ext.form.TextField({
			name:'phone',
			fieldLabel: t("Phone"),
			maskRe:/([0-9\s]+)$/
		});
		this.email = new Ext.form.TextField({
			name:'email',
			fieldLabel:t("E-mail"),
			allowBlank: GO.settings.config.tickets_no_email_required,
			vtype:'emailAddress'
		});
		
		this.contactFieldset = {
			xtype:'fieldset',
			title:t("Customer"),
			collapsed:false,
			defaults:{
				anchor:'100%'
			},
			items:[
				this.selectContact,
				this.selectCompany, 
				this.selectTicketGroup, 
				this.first_name, 
				this.middle_name, 
				this.last_name, 
				this.phone, 
				this.email
			]
		}
	},
	
	buildTicketFieldSet : function(){
		this.subject = new Ext.form.TextField({
			name:'subject',
			fieldLabel: t("Subject", "tickets"),
			allowBlank:false
		});
		
		this.selectType = new GO.tickets.SelectType({
			listeners:{
				change:function(){					
					go.customfields.CustomFields.filterFieldSets(this.formPanel);										
				},
				scope:this
			}
		});
		
		this.selectType.on('select', function(combo, record) {
			this.setTypeAcl(record.data.acl_id);
			this.setFormMode(record.data.permission_level<GO.permissionLevels.manage);
		}, this);
		
		this.selectAgent = new GO.tickets.SelectAgent();
				
		this.selectPriority = new GO.form.SelectPriority();


			GO.tickets.ratesStore.on('load',function(){
				var selectRateEl = this.formPanel.form.findField('rate_fields').getEl().up('.x-form-item');
				selectRateEl.setVisibilityMode(Ext.Element.DISPLAY);
				
				//hide on existing tickets or when there are no rates
				if(!GO.tickets.ratesStore.getCount() || this.remoteModelId || this.formModeCustomer){
					if(selectRateEl.isVisible()){
						selectRateEl.hide();
					}
				}else
				{
					if(!selectRateEl.isVisible()){
						selectRateEl.show();
						this.formPanel.form.findField('rate_fields').doLayout();
					}
				}
			}, this);
			
			this.selectRate = new Ext.form.CompositeField({
//				xtype:'compositefield',
				itemId:'rate_fields',
				fieldLabel:t("Rate / hours", "tickets"),
				items:[
				{
					flex:2,
					xtype:'comboboxreset',
					mode:'local',
					triggerAction:'all',
					store:GO.tickets.ratesStore,
					emptyText:t("No rate", "tickets"),
					hiddenName:'rate_id',
					valueField:'id',
					displayField:'name',
					listeners:{
						clear:this.toggleRateHours,
						select:this.toggleRateHours,
						scope:this
					}
				},{
					flex:1,
					xtype:'numberfield',
					name:'rate_hours',
					value:0
				}
				]
			});
		
		
		this.ticketFieldset = {
			xtype:'fieldset',
			title:t("Ticket", "tickets"),
			//autoHeight:true,
			collapsed:false,
			defaults:{
				anchor:'100%'
			},
			items:[
				this.subject, 
				this.selectType,
				this.selectAgent,
				this.selectPriority,
				this.selectRate
			]
		}
	},
	
	beforeLoad : function(remoteModelId, config){
		
		this.setCompanyId(0);
		delete this.formPanel.baseParams.contact_id;
		this.external.setValue(GO.tickets.notify_contact);
		
		if(!GO.tickets.writableTypesStore.loaded)
			GO.tickets.writableTypesStore.load();

		//When a ticket is created from a contact new menu, send the contact ID so the data can be loaded.
		if(!this.formModeCustomer && !remoteModelId && this.link){			
			if(this.link.entity == 'Contact'){				
				config.loadParams.contact_id=this.link.entityId;
			}
			if(this.link.entity == 'Company'){				
				config.loadParams.contact_id=this.link.entityId
			}
		}

		this.createLinkButton.setEntity("Ticket", remoteModelId);

		if(!this.selectTemplate.store.loaded)
		{
			this.selectTemplate.store.load({
				scope:this,
				callback:function(){
					if(GO.tickets.ticketCreatedforClientTemplateID)
						this.selectTemplate.setValue(GO.tickets.ticketCreatedforClientTemplateID);
				}
			});
		}else
		{
			if(GO.tickets.ticketCreatedforClientTemplateID)
				this.selectTemplate.setValue(GO.tickets.ticketCreatedforClientTemplateID);
		}
	},
	
	afterSubmit : function(action){
		this.uploadFile.clearQueue();
	},
	
	afterShowAndLoad : function(remoteModelId, config, result){

	  this.uploadFile.clearQueue();
		// Following three ifs with config.values are for when the dialog is openened
		// from Save Mail As Ticket
		if(result.data){
			var v = result.data;

			this.contact_id = this.formPanel.baseParams.contact_id=v.contact_id;

			if(v.company_id) {
				this.setCompanyId(v.company_id);
				this.selectCompany.setValue(v.company_id);
			}	
		}
		
		
	},
	
	toggleRateHours : function(){
		if(this.rendered && this.selectRate){
			var enabled = this.formPanel.form.findField('rate_id').getValue()>0;
			this.formPanel.form.findField('rate_hours').setDisabled(!enabled);
		}
	},
	
	buildContentFieldSet : function(){
		this.content = new Ext.form.TextArea({
			name:'content',
			hideLabel: true,
			anchor:'100%',
			height:130
		});
		this.selectTemplate = new GO.form.ComboBox({
			hiddenName:'template_id',
			fieldLabel:t("Use email template", "tickets"),
			valueField:'id',
			displayField:'name',
			store:GO.tickets.templatesStore,
			mode:'local',
			triggerAction:'all',
			editable:false,
			selectOnFocus:true,
			forceSelection:true
		});
		this.external = new Ext.ux.form.XCheckbox({
			name:'notify_contact',
			boxLabel:t("Notify contact", "tickets"),
			hideLabel:true,
			checked:true
		});
		
		this.uploadFile = new GO.form.UploadFile({
			inputName : 'attachments',
			addText : t("Attach files", "tickets")
		});
		
		this.contentOptionsPanel = {
			xtype:'panel',
			layout:'form',
			//autoHeight:true,
			border:false,
			defaults:{
				anchor:'100%'
			},
			items:[this.selectTemplate,this.external,	this.uploadFile]
		}
		
		this.contentFieldset = new Ext.form.FieldSet({
			title:t("Message", "tickets"),
			collapsed:false,
			//autoHeight:true,
			defaults:{
				border:false
			},
			items:[{
				layout:'column',				
				defaults:{
					border:false,
					columnWidth:.5,				
					mobile: {
						columnWidth: 1
					}
				},

				
				items:[{
					
					layout:'form',
					items:[this.content]
				},{					
					bodyStyle:'padding:10px 0 0 20px',
					items:[this.contentOptionsPanel]
				}]
			}]
		});
	},
	
	buildForm : function () {
		this.buildTicketGroupSelect();
		this.buildCustomerFieldSet();
		this.buildTicketFieldSet();
		this.buildContentFieldSet();
		



		if(go.Modules.isAvailable("legacy", "email")) {
			this.ccField = new GO.email.RecipientCombo({
				fieldLabel : t("CC notifications to", "tickets"),
				name : 'cc_addresses',
				
				//width: '-20',
				height : 50,
				store:  new go.data.Store({
					method: "Search/email",
					fields: ['entityId', 'entity', 'email', 'name', 'photoBlobId',
						{
							name: "full_email",
							convert: function (v, data) {						
								return '"' + data.name.replace(/"/g, '\\"') + '" <' + data.email + '>';
							}
						}]
				}),
				maxLength: 255,
				allowBlank:true
			});
		} else {
			this.ccField = new Ext.form.TextArea({
				name:'cc_addresses',
				//width: '-20',
				height: 50,
				maxLength: 255,
				fieldLabel:t("CC notifications to", "tickets"),
				allowBlank:true
			});
		}
		
		
		this.ccFieldset = {
			xtype:'fieldset',
//			title:,
			collapsed:false,
			defaults:{
				anchor:'100%'
			},
			items:[
				this.ccField,
				this.dueDate = new Ext.form.DateField({
					name:'due_date',
					fieldLabel: t('Due at')
				})
			]
		}
		
		this.propertiesPanel = new Ext.Panel({
			bodyStyle:'padding:5px',			
			defaults:{
				border:false
			},
			autoScroll:true,
			layoutConfig:{autoScroll:true},
			title:t("Ticket", "tickets"),
			border:false,
			items:[{				
				layout:'column',
				defaults:{
					border:false,
					columnWidth:.5,
					mobile: {
						columnWidth: 1
					}
				},
				items:[{
					
					items:[this.contactFieldset]
				},{
					
					bodyStyle:'padding-left:10px',
					items:[
						this.ticketFieldset,
						this.ccFieldset
					]
				}]
			},{
				items:[
					this.contentFieldset
				]
			}]
		});
		
		//his.propertiesPanel.add(go.customfields.CustomFields.getFormFieldSets("Ticket"));
	

		this.addPanel(this.propertiesPanel);
	},
	
	afterLoad  : function(remoteModelId, config, action){	

		if(remoteModelId){
			this.contentFieldset.hide();
			this.content.allowBlank=true;
		}else
		{
			this.contentFieldset.show();
			this.content.allowBlank=false;
		}

		this.setFormMode(action.result.data.permission_level<GO.permissionLevels.manage);
		this.setCompanyId(action.result.data.company_id);
		this.selectContact.setValue(action.result.data.contact_id);
		this.setTypeAcl(action.result.data.acl_id);
		
		//do focus again so it finds a field that's not disabled
		this.focus();

	},
	
	formModeCustomer : false,

  //customer: boolean, true if permissionlevel lower then manager
	setFormMode : function(customer){
		var oldCustomer = this.formModeCustomer;
		this.formModeCustomer = customer;
		
		this.selectContact.setDisabled(customer);
		this.selectCompany.setDisabled(customer);
		this.first_name.setDisabled(customer);
		this.middle_name.setDisabled(customer);
		this.last_name.setDisabled(customer);
		this.phone.setDisabled(customer);
		this.email.setDisabled(customer);		
		
		if(oldCustomer && !customer) {
			this.showConfig.values = this.showConfig.values || {};
			this.showConfig.loadParams = this.showConfig.loadParams || {};
			this.showConfig.loadParams.type_id = this.showConfig.values.type_id = this.selectType.getValue();
			this.showConfig.values.content = this.content.getValue();
			this.showConfig.values.subject = this.subject.getValue();
			this.showConfig.values.priority = this.selectPriority.getValue();
			


			this.show(this.remoteModelId, this.showConfig);			
			return;
		}
		
		
		if(customer){
			this.selectTemplate.setValue(0);
			this.formPanel.form.setValues(GO.tickets.customerDefaultAttr);
			this.selectContact.reset();
			this.selectCompany.reset();
		}else{
			if(GO.tickets.ticketCreatedforClientTemplateID)
				this.selectTemplate.setValue(GO.tickets.ticketCreatedforClientTemplateID);
		}
		
		this.selectTemplate.getEl().up('div.x-form-item').setDisplayed(!customer);
		this.external.getEl().up('div.x-form-item').setDisplayed(!customer);	
		
		if(!GO.tickets.ratesStore.getCount() || this.formModeCustomer)
			this.selectRate.getEl().up('div.x-form-item').hide();
		else
			this.selectRate.getEl().up('div.x-form-item').show();
		
		this.selectAgent.getEl().up('div.x-form-item').setDisplayed(!customer);	

	},
	
	setTypeAcl : function(acl_id){
		if(this.selectAgent.store.baseParams.acl_id != acl_id){
			this.selectAgent.store.baseParams.acl_id = acl_id;
			//this.selectAgent.clearValue();
			delete this.selectAgent.lastQuery;
		}
	},
	
	// this may happen after company is set or type is changed
	setCompanyId : function(company_id) {
			
		this.company_id = this.formPanel.baseParams.company_id=company_id;
		if(this.selectCompany && company_id)
			this.selectCompany.setValue(company_id);
		
		this.selectTicketGroup.store.baseParams['company_id'] = company_id;
		this.selectTicketGroup.store.load();
		this.selectTicketGroup.clearLastSearch();
		
		if(this.selectRate && !this.formModeCustomer){
			this.selectRate.items.get(0).clearLastSearch();		
			this.selectRate.items.get(0).store.reload({
				params : {
					'company_id': this.company_id,
					include_global_rates: true
				}
			});
		}
		//this.selectCompany.fireEvent('change', this.selectCompany,company_id);

		
	}
	
	
});
