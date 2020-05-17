<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ASDevice' => $baseDir . '/lib/core/asdevice.php',
    'Auth_SASL' => $baseDir . '/backend/imap/Auth/SASL.php',
    'Auth_SASL_Anonymous' => $baseDir . '/backend/imap/Auth/SASL/Anonymous.php',
    'Auth_SASL_Common' => $baseDir . '/backend/imap/Auth/SASL/Common.php',
    'Auth_SASL_CramMD5' => $baseDir . '/backend/imap/Auth/SASL/CramMD5.php',
    'Auth_SASL_DigestMD5' => $baseDir . '/backend/imap/Auth/SASL/DigestMD5.php',
    'Auth_SASL_External' => $baseDir . '/backend/imap/Auth/SASL/External.php',
    'Auth_SASL_Login' => $baseDir . '/backend/imap/Auth/SASL/Login.php',
    'Auth_SASL_Plain' => $baseDir . '/backend/imap/Auth/SASL/Plain.php',
    'Auth_SASL_SCRAM' => $baseDir . '/backend/imap/Auth/SASL/SCRAM.php',
    'AuthenticationRequiredException' => $baseDir . '/lib/exceptions/authenticationrequiredexception.php',
    'Backend' => $baseDir . '/lib/default/backend.php',
    'BackendCalDAV' => $baseDir . '/backend/caldav/caldav.php',
    'BackendCardDAV' => $baseDir . '/backend/carddav/carddav.php',
    'BackendCombined' => $baseDir . '/backend/combined/combined.php',
    'BackendCombinedConfig' => $baseDir . '/backend/combined/config.php',
    'BackendDiff' => $baseDir . '/lib/default/diffbackend/diffbackend.php',
    'BackendICS' => $baseDir . '/backend/kopano/kopano.php',
    'BackendIMAP' => $baseDir . '/backend/imap/imap.php',
    'BackendKopano' => $baseDir . '/backend/kopano/kopano.php',
    'BackendLDAP' => $baseDir . '/backend/ldap/ldap.php',
    'BackendMaildir' => $baseDir . '/backend/maildir/maildir.php',
    'BackendSearchLDAP' => $baseDir . '/backend/searchldap/searchldap.php',
    'BackendStickyNote' => $baseDir . '/backend/stickynote/stickynote.php',
    'BackendVCardDir' => $baseDir . '/backend/vcarddir/vcarddir.php',
    'BackendZarafa' => $baseDir . '/backend/kopano/kopano.php',
    'BaseException' => $baseDir . '/backend/kopano/mapi/class.baseexception.php',
    'BaseRecurrence' => $baseDir . '/backend/kopano/mapi/class.baserecurrence.php',
    'BodyPartPreference' => $baseDir . '/lib/core/bodypartpreference.php',
    'BodyPreference' => $baseDir . '/lib/core/bodypreference.php',
    'CalDAVClient' => $baseDir . '/include/z_caldav.php',
    'CalendarInfo' => $baseDir . '/include/z_caldav.php',
    'ChangesMemoryWrapper' => $baseDir . '/lib/core/changesmemorywrapper.php',
    'ContentParameters' => $baseDir . '/lib/core/contentparameters.php',
    'DeviceManager' => $baseDir . '/lib/core/devicemanager.php',
    'DiffState' => $baseDir . '/lib/default/diffbackend/diffstate.php',
    'ExportChangesCombined' => $baseDir . '/backend/combined/exporter.php',
    'ExportChangesDiff' => $baseDir . '/lib/default/diffbackend/exportchangesdiff.php',
    'ExportChangesICS' => $baseDir . '/backend/kopano/exporter.php',
    'FatalException' => $baseDir . '/lib/exceptions/fatalexception.php',
    'FatalMisconfigurationException' => $baseDir . '/lib/exceptions/fatalmisconfigurationexception.php',
    'FatalNotImplementedException' => $baseDir . '/lib/exceptions/fatalnotimplementedexception.php',
    'FileLog' => $baseDir . '/lib/log/filelog.php',
    'FileStateMachine' => $baseDir . '/lib/default/filestatemachine.php',
    'FolderChange' => $baseDir . '/lib/request/folderchange.php',
    'FolderSync' => $baseDir . '/lib/request/foldersync.php',
    'FreeBusyPublish' => $baseDir . '/backend/kopano/mapi/class.freebusypublish.php',
    'GetAttachment' => $baseDir . '/lib/request/getattachment.php',
    'GetHierarchy' => $baseDir . '/lib/request/gethierarchy.php',
    'GetItemEstimate' => $baseDir . '/lib/request/getitemestimate.php',
    'HTTPReturnCodeException' => $baseDir . '/lib/exceptions/httpreturncodeexception.php',
    'HierarchyCache' => $baseDir . '/lib/core/hierarchycache.php',
    'IBackend' => $baseDir . '/lib/interface/ibackend.php',
    'IChanges' => $baseDir . '/lib/interface/ichanges.php',
    'IExportChanges' => $baseDir . '/lib/interface/iexportchanges.php',
    'IImportChanges' => $baseDir . '/lib/interface/iimportchanges.php',
    'IIpcProvider' => $baseDir . '/lib/interface/iipcprovider.php',
    'ISearchProvider' => $baseDir . '/lib/interface/isearchprovider.php',
    'IStateMachine' => $baseDir . '/lib/interface/istatemachine.php',
    'ImportChangesCombined' => $baseDir . '/backend/combined/importer.php',
    'ImportChangesDiff' => $baseDir . '/lib/default/diffbackend/importchangesdiff.php',
    'ImportChangesICS' => $baseDir . '/backend/kopano/importer.php',
    'ImportChangesStream' => $baseDir . '/lib/core/streamimporter.php',
    'ImportHierarchyChangesCombinedWrap' => $baseDir . '/backend/combined/importer.php',
    'InterProcessData' => $baseDir . '/lib/core/interprocessdata.php',
    'IpcMemcachedProvider' => $baseDir . '/backend/ipcmemcached/ipcmemcachedprovider.php',
    'IpcSharedMemoryProvider' => $baseDir . '/backend/ipcsharedmemory/ipcsharedmemoryprovider.php',
    'IpcWincacheProvider' => $baseDir . '/backend/ipcwincache/ipcwincacheprovider.php',
    'ItemOperations' => $baseDir . '/lib/request/itemoperations.php',
    'KoeSignature' => $baseDir . '/lib/core/koesignatures.php',
    'KoeSignatures' => $baseDir . '/lib/core/koesignatures.php',
    'KopanoChangesWrapper' => $baseDir . '/backend/kopano/kopanochangeswrapper.php',
    'Log' => $baseDir . '/lib/log/log.php',
    'LoopDetection' => $baseDir . '/lib/core/loopdetection.php',
    'MAPIException' => $baseDir . '/backend/kopano/mapi/class.mapiexception.php',
    'MAPIMapping' => $baseDir . '/backend/kopano/mapimapping.php',
    'MAPIProvider' => $baseDir . '/backend/kopano/mapiprovider.php',
    'MAPIStreamWrapper' => $baseDir . '/backend/kopano/mapistreamwrapper.php',
    'MAPIUtils' => $baseDir . '/backend/kopano/mapiutils.php',
    'Mail' => $baseDir . '/backend/imap/Mail.php',
    'Mail_RFC822' => $baseDir . '/include/z_RFC822.php',
    'Mail_mail' => $baseDir . '/backend/imap/Mail/mail.php',
    'Mail_mimeDecode' => $baseDir . '/include/mimeDecode.php',
    'Mail_mimePart' => $baseDir . '/backend/imap/mimePart.php',
    'Mail_sendmail' => $baseDir . '/backend/imap/Mail/sendmail.php',
    'Mail_smtp' => $baseDir . '/backend/imap/Mail/smtp.php',
    'MeetingResponse' => $baseDir . '/lib/request/meetingresponse.php',
    'Meetingrequest' => $baseDir . '/backend/kopano/mapi/class.meetingrequest.php',
    'MoveItems' => $baseDir . '/lib/request/moveitems.php',
    'Net_SMTP' => $baseDir . '/backend/imap/Net/SMTP.php',
    'Net_Socket' => $baseDir . '/backend/imap/Net/Socket.php',
    'NoHierarchyCacheAvailableException' => $baseDir . '/lib/exceptions/nohierarchycacheavailableexception.php',
    'NoPostRequestException' => $baseDir . '/lib/exceptions/nopostrequestexception.php',
    'NotImplementedException' => $baseDir . '/lib/exceptions/notimplementedexception.php',
    'Notify' => $baseDir . '/lib/request/notify.php',
    'PHPWrapper' => $baseDir . '/backend/kopano/mapiphpwrapper.php',
    'Ping' => $baseDir . '/lib/request/ping.php',
    'PingTracking' => $baseDir . '/lib/core/pingtracking.php',
    'Provisioning' => $baseDir . '/lib/request/provisioning.php',
    'ProvisioningRequiredException' => $baseDir . '/lib/exceptions/provisioningrequiredexception.php',
    'Recurrence' => $baseDir . '/backend/kopano/mapi/class.recurrence.php',
    'ReplaceNullcharFilter' => $baseDir . '/lib/wbxml/replacenullcharfilter.php',
    'ReplyBackImExporter' => $baseDir . '/backend/kopano/replybackimexporter.php',
    'ReplyBackState' => $baseDir . '/backend/kopano/replybackstate.php',
    'Request' => $baseDir . '/lib/request/request.php',
    'RequestProcessor' => $baseDir . '/lib/request/requestprocessor.php',
    'ResolveRecipients' => $baseDir . '/lib/request/resolverecipients.php',
    'Search' => $baseDir . '/lib/request/search.php',
    'SearchProvider' => $baseDir . '/lib/default/searchprovider.php',
    'SendMail' => $baseDir . '/lib/request/sendmail.php',
    'ServiceUnavailableException' => $baseDir . '/lib/exceptions/serviceunavailableexception.php',
    'Settings' => $baseDir . '/lib/request/settings.php',
    'SimpleMutex' => $baseDir . '/lib/default/simplemutex.php',
    'SqlStateMachine' => $baseDir . '/backend/sqlstatemachine/sqlstatemachine.php',
    'StateInvalidException' => $baseDir . '/lib/exceptions/stateinvalidexception.php',
    'StateManager' => $baseDir . '/lib/core/statemanager.php',
    'StateNotFoundException' => $baseDir . '/lib/exceptions/statenotfoundexception.php',
    'StateNotYetAvailableException' => $baseDir . '/lib/exceptions/statenotyetavailableexception.php',
    'StateObject' => $baseDir . '/lib/core/stateobject.php',
    'StatusException' => $baseDir . '/lib/exceptions/statusexception.php',
    'Streamer' => $baseDir . '/lib/core/streamer.php',
    'StringStreamWrapper' => $baseDir . '/lib/utils/stringstreamwrapper.php',
    'Sync' => $baseDir . '/lib/request/sync.php',
    'SyncAccount' => $baseDir . '/lib/syncobjects/syncaccount.php',
    'SyncAppointment' => $baseDir . '/lib/syncobjects/syncappointment.php',
    'SyncAppointmentException' => $baseDir . '/lib/syncobjects/syncappointmentexception.php',
    'SyncAttachment' => $baseDir . '/lib/syncobjects/syncattachment.php',
    'SyncAttendee' => $baseDir . '/lib/syncobjects/syncattendee.php',
    'SyncBaseAttachment' => $baseDir . '/lib/syncobjects/syncbaseattachment.php',
    'SyncBaseBody' => $baseDir . '/lib/syncobjects/syncbasebody.php',
    'SyncBaseBodyPart' => $baseDir . '/lib/syncobjects/syncbasebodypart.php',
    'SyncCollections' => $baseDir . '/lib/core/synccollections.php',
    'SyncContact' => $baseDir . '/lib/syncobjects/synccontact.php',
    'SyncDeviceInformation' => $baseDir . '/lib/syncobjects/syncdeviceinformation.php',
    'SyncDevicePassword' => $baseDir . '/lib/syncobjects/syncdevicepassword.php',
    'SyncEmailAddresses' => $baseDir . '/lib/syncobjects/syncemailaddresses.php',
    'SyncFolder' => $baseDir . '/lib/syncobjects/syncfolder.php',
    'SyncItemOperationsAttachment' => $baseDir . '/lib/syncobjects/syncitemoperationsattachment.php',
    'SyncMail' => $baseDir . '/lib/syncobjects/syncmail.php',
    'SyncMailFlags' => $baseDir . '/lib/syncobjects/syncmailflags.php',
    'SyncMeetingRequest' => $baseDir . '/lib/syncobjects/syncmeetingrequest.php',
    'SyncMeetingRequestRecurrence' => $baseDir . '/lib/syncobjects/syncmeetingrequestrecurrence.php',
    'SyncNote' => $baseDir . '/lib/syncobjects/syncnote.php',
    'SyncOOF' => $baseDir . '/lib/syncobjects/syncoof.php',
    'SyncOOFMessage' => $baseDir . '/lib/syncobjects/syncoofmessage.php',
    'SyncObject' => $baseDir . '/lib/syncobjects/syncobject.php',
    'SyncObjectBrokenException' => $baseDir . '/lib/exceptions/syncobjectbrokenexception.php',
    'SyncParameters' => $baseDir . '/lib/core/syncparameters.php',
    'SyncProvisioning' => $baseDir . '/lib/syncobjects/syncprovisioning.php',
    'SyncRecurrence' => $baseDir . '/lib/syncobjects/syncrecurrence.php',
    'SyncResolveRecipient' => $baseDir . '/lib/syncobjects/syncresolverecipient.php',
    'SyncResolveRecipients' => $baseDir . '/lib/syncobjects/syncresolverecipients.php',
    'SyncResolveRecipientsAvailability' => $baseDir . '/lib/syncobjects/syncresolverecipientsavailability.php',
    'SyncResolveRecipientsCertificates' => $baseDir . '/lib/syncobjects/syncresolverecipientscertificates.php',
    'SyncResolveRecipientsOptions' => $baseDir . '/lib/syncobjects/syncresolverecipientsoptions.php',
    'SyncResolveRecipientsPicture' => $baseDir . '/lib/syncobjects/syncresolverecipientspicture.php',
    'SyncResolveRecipientsResponse' => $baseDir . '/lib/syncobjects/syncresolverecipientsresponse.php',
    'SyncRightsManagementLicense' => $baseDir . '/lib/syncobjects/syncrightsmanagementlicense.php',
    'SyncRightsManagementTemplate' => $baseDir . '/lib/syncobjects/syncrightsmanagementtemplate.php',
    'SyncRightsManagementTemplates' => $baseDir . '/lib/syncobjects/syncrightsmanagementtemplates.php',
    'SyncSendMail' => $baseDir . '/lib/syncobjects/syncsendmail.php',
    'SyncSendMailSource' => $baseDir . '/lib/syncobjects/syncsendmailsource.php',
    'SyncTask' => $baseDir . '/lib/syncobjects/synctask.php',
    'SyncTaskRecurrence' => $baseDir . '/lib/syncobjects/synctaskrecurrence.php',
    'SyncUserInformation' => $baseDir . '/lib/syncobjects/syncuserinformation.php',
    'SyncValidateCert' => $baseDir . '/lib/syncobjects/syncvalidatecert.php',
    'Syslog' => $baseDir . '/lib/log/syslog.php',
    'TaskRecurrence' => $baseDir . '/backend/kopano/mapi/class.taskrecurrence.php',
    'TaskRequest' => $baseDir . '/backend/kopano/mapi/class.taskrequest.php',
    'TimezoneUtil' => $baseDir . '/lib/utils/timezoneutil.php',
    'TopCollector' => $baseDir . '/lib/core/topcollector.php',
    'UnavailableException' => $baseDir . '/lib/exceptions/unavailableexception.php',
    'Utils' => $baseDir . '/lib/utils/utils.php',
    'ValidateCert' => $baseDir . '/lib/request/validatecert.php',
    'WBXMLDecoder' => $baseDir . '/lib/wbxml/wbxmldecoder.php',
    'WBXMLDefs' => $baseDir . '/lib/wbxml/wbxmldefs.php',
    'WBXMLEncoder' => $baseDir . '/lib/wbxml/wbxmlencoder.php',
    'WBXMLException' => $baseDir . '/lib/exceptions/wbxmlexception.php',
    'Webservice' => $baseDir . '/lib/webservice/webservice.php',
    'WebserviceDevice' => $baseDir . '/lib/webservice/webservicedevice.php',
    'WebserviceInfo' => $baseDir . '/lib/webservice/webserviceinfo.php',
    'WebserviceUsers' => $baseDir . '/lib/webservice/webserviceusers.php',
    'ZLog' => $baseDir . '/lib/core/zlog.php',
    'ZPush' => $baseDir . '/lib/core/zpush.php',
    'ZPushAdmin' => $baseDir . '/lib/utils/zpushadmin.php',
    'ZPushAutodiscover' => $baseDir . '/autodiscover/autodiscover.php',
    'ZPushException' => $baseDir . '/lib/exceptions/zpushexception.php',
    'carddav_backend' => $baseDir . '/include/z_carddav.php',
    'iCalComponent' => $baseDir . '/include/iCalendar.php',
    'iCalProp' => $baseDir . '/include/iCalendar.php',
    'iCalendar' => $baseDir . '/include/iCalendar.php',
    'rtf' => $baseDir . '/include/z_RTF.php',
);
