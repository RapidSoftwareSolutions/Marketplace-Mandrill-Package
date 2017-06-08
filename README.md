[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Mandrill/functions?utm_source=RapidAPIGitHub_MandrillFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Mandrill Package
Mandrill
* Domain: [Mandrill](http://mandrill.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Mandrill website](http://mandrill.com)
1. Register or log in
2. Go to [Settings page](https://mandrillapp.com/settings) to generate or get yout apiKey

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Mandrill.getUserInfo
Return the information about the API-connected user

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.validateApiKey
Validate an API key and respond to a ping

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.getSenders
Return the senders that have tried to use this account, both verified and unverified

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.sendTransactionalMessage
Send a new transactional message through Mandrill

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| Api key obtained from Mandrill
| messageHtml                   | String     | The full HTML content to be sent
| messageText                   | String     | Optional full text content to be sent
| messageSubject                | String     | The message subject
| messageFromEmail              | String     | The sender email address.
| messageFromName               | String     | Optional from name to be used
| messageTo                     | List       | An array of recipient information.
| messageHeaders                | JSON       | Optional extra headers to add to the message (most headers are allowed)
| messageImportant              | Boolean    | Whether or not this message is important, and should be delivered ahead of non-important messages
| messageTrackOpens             | Boolean    | Whether or not to turn on open tracking for the message
| messageTrackClicks            | Boolean    | Whether or not to turn on click tracking for the message
| messageAutoText               | Boolean    | Whether or not to automatically generate a text part for messages that are not given text
| messageAutoHtml               | Boolean    | Whether or not to automatically generate an HTML part for messages that are not given HTML
| messageInlineCss              | Boolean    | Whether or not to automatically inline all CSS styles provided in the message HTML - only for HTML documents less than 256KB in size
| messageUseStripQs             | Boolean    | Whether or not to strip the query string from URLs when aggregating tracked URL data
| messagePreserveRecipients     | Boolean    | Whether or not to expose all recipients in to "To" header for each email
| messageViewContentLink        | Boolean    | Whether or not to remove content logging for sensitive emails
| messageBccAddress             | String     | An optional address to receive an exact copy of each recipient's email
| messageTrackingDomain         | String     | A custom domain to use for tracking opens and clicks instead of mandrillapp.com
| messageSigningDomain          | String     | A custom domain to use for SPF/DKIM signing instead of mandrill (for "via" or "on behalf of" in email clients)
| messageReturnPathDomain       | String     | A custom domain to use for the messages's return-path
| messageMerge                  | Boolean    | Whether to evaluate merge tags in the message. Will automatically be set to true if either messageMergeVars or messageGlobalMergeVars are provided.
| messageMergeLanguage          | String     | The merge tag language to use when evaluating merge tags, either mailchimp or handlebars
| messageGlobalMergeVars        | List       | Array. Global merge variables to use for all recipients. You can override these per recipient.
| messageMergeVars              | List       | Array. Per-recipient merge variables, which override global merge variables with the same name.
| messageTags                   | List       | Array. An array of string to tag the message with. Stats are accumulated using tags, though we only store the first 100 we see, so this should not be unique or change frequently. Tags should be 50 characters or less. Any tags starting with an underscore are reserved for internal use and will cause errors.
| messageSubaccount             | String     | The unique id of a subaccount for this message - must already exist or will fail with an error
| messageGoogleAnalyticsDomains | List       | Array. An array of strings indicating for which any matching URLs will automatically have Google Analytics parameters appended to their query string automatically.
| messageGoogleAnalyticsCampaign| String     | String indicating the value to set for the utm_campaign tracking parameter. If this isn't provided the email's from address will be used instead.
| messageMetadata               | List       | Array. Metadata an associative array of user metadata. Mandrill will store this metadata and make it available for retrieval. In addition, you can select up to 10 metadata fields to index and make searchable using the Mandrill search api.
| messageRecipientMetadata      | List       | Array. Per-recipient metadata that will override the global values specified in the metadata parameter.
| messageAttachments            | List       | Array. An array of supported attachments to add to the message
| messageImages                 | List       | Array. An array of embedded images to add to the message
| async                         | Boolean    | Enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
| ipPool                        | String     | The name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
| sendAt                        | DatePicker | When this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.

## Mandrill.sendTemplateTransactionalMessage
Send a new transactional message through Mandrill using a template

| Field                         | Type       | Description
|-------------------------------|------------|----------
| apiKey                        | credentials| Api key obtained from Mandrill
| messageHtml                   | String     | The full HTML content to be sent
| templateName                  | String     | The immutable name or slug of a template that exists in the user's account. For backwards-compatibility, the template name may also be used but the immutable slug is preferred.
| templateContent               | List     | Array. An array of template content to send. Each item in the array should be a struct with two keys - name: the name of the content block to set the content for, and content: the actual content to put into the block
| messageText                   | String     | Optional full text content to be sent
| messageSubject                | String     | The message subject
| messageFromEmail              | String     | The sender email address.
| messageFromName               | String     | Optional from name to be used
| messageTo                     | List       | Array. An array of recipient information.
| messageHeaders                | JSON       | Optional extra headers to add to the message (most headers are allowed)
| messageImportant              | Boolean    | Whether or not this message is important, and should be delivered ahead of non-important messages
| messageTrackOpens             | Boolean    | Whether or not to turn on open tracking for the message
| messageTrackClicks            | Boolean    | Whether or not to turn on click tracking for the message
| messageAutoText               | Boolean    | Whether or not to automatically generate a text part for messages that are not given text
| messageAutoHtml               | Boolean    | Whether or not to automatically generate an HTML part for messages that are not given HTML
| messageInlineCss              | Boolean    | Whether or not to automatically inline all CSS styles provided in the message HTML - only for HTML documents less than 256KB in size
| messageUseStripQs             | Boolean    | Whether or not to strip the query string from URLs when aggregating tracked URL data
| messagePreserveRecipients     | Boolean    | Whether or not to expose all recipients in to "To" header for each email
| messageViewContentLink        | Boolean    | Whether or not to remove content logging for sensitive emails
| messageBccAddress             | String     | An optional address to receive an exact copy of each recipient's email
| messageTrackingDomain         | String     | A custom domain to use for tracking opens and clicks instead of mandrillapp.com
| messageSigningDomain          | String     | A custom domain to use for SPF/DKIM signing instead of mandrill (for "via" or "on behalf of" in email clients)
| messageReturnPathDomain       | String     | A custom domain to use for the messages's return-path
| messageMerge                  | Boolean    | Whether to evaluate merge tags in the message. Will automatically be set to true if either messageMergeVars or messageGlobalMergeVars are provided.
| messageMergeLanguage          | String     | The merge tag language to use when evaluating merge tags, either mailchimp or handlebars
| messageGlobalMergeVars        | List       | Array. Global merge variables to use for all recipients. You can override these per recipient.
| messageMergeVars              | List       | Array. Per-recipient merge variables, which override global merge variables with the same name.
| messageTags                   | List       | Array. An array of string to tag the message with. Stats are accumulated using tags, though we only store the first 100 we see, so this should not be unique or change frequently. Tags should be 50 characters or less. Any tags starting with an underscore are reserved for internal use and will cause errors.
| messageSubaccount             | String     | The unique id of a subaccount for this message - must already exist or will fail with an error
| messageGoogleAnalyticsDomains | List       | Array. An array of strings indicating for which any matching URLs will automatically have Google Analytics parameters appended to their query string automatically.
| messageGoogleAnalyticsCampaign| String     | String indicating the value to set for the utm_campaign tracking parameter. If this isn't provided the email's from address will be used instead.
| messageMetadata               | List       | Array. Metadata an associative array of user metadata. Mandrill will store this metadata and make it available for retrieval. In addition, you can select up to 10 metadata fields to index and make searchable using the Mandrill search api.
| messageRecipientMetadata      | List       | Array. Per-recipient metadata that will override the global values specified in the metadata parameter.
| messageAttachments            | List       | Array. An array of supported attachments to add to the message
| messageImages                 | List       | Array. An array of embedded images to add to the message
| async                         | Boolean    | Enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
| ipPool                        | String     | The name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
| sendAt                        | DatePicker     | When this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.

## Mandrill.searchMessages
Search recently sent messages and optionally narrow by date range, tags, senders, and API keys.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| query   | String     | Search terms to find matching messages
| dateFrom| DatePicker | Start date
| dateTo  | DatePicker | End date
| tags    | List       | Array. An array of tag names to narrow the search to, will return messages that contain ANY of the tags
| senders | List       | Array. An array of sender addresses to narrow the search to, will return messages sent by ANY of the senders
| apiKeys | List       | Array. An array of API keys to narrow the search to, will return messages sent by ANY of the keys
| limit   | Number     | The maximum number of results to return, defaults to 100, 1000 is the maximum

## Mandrill.searchTimeSeriesMessages
Search the content of recently sent messages and return the aggregated hourly stats for matching messages

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| query   | String     | Search terms to find matching messages
| dateFrom| DatePicker | Start date
| dateTo  | DatePicker | End date
| tags    | List       | Array. An array of tag names to narrow the search to, will return messages that contain ANY of the tags
| senders | List       | Array. An array of sender addresses to narrow the search to, will return messages sent by ANY of the senders

## Mandrill.getSingleMessage
Get the information for a single recently sent message

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| messageId| String     | The unique id of the message to get - passed as the "_id" field in webhooks, send calls, or search calls

## Mandrill.parseEmailMessage
Parse the full MIME document for an email message, returning the content of the message broken into its constituent pieces

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key obtained from Mandrill
| rawMessage| String     | The full MIME document of an email message

## Mandrill.sendRawMessage
Take a raw MIME document for a message, and send it exactly as if it were sent through Mandrill's SMTP servers

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Api key obtained from Mandrill
| rawMessage      | String     | The full MIME document of an email message
| fromEmail       | String     | Optionally define the sender address - otherwise we'll use the address found in the provided headers
| fromName        | String     | Optionally define the sender alias
| to              | List       | Array. Optionally define the recipients to receive the message - otherwise we'll use the To, Cc, and Bcc headers provided in the document
| async           | Boolean    | Enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
| ipPool          | String     | The name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
| sendAt          | DatePicker | When this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.
| returnPathDomain| String     | A custom domain to use for the messages's return-path

## Mandrill.getScheduledEmails
Queries your scheduled emails.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| to    | String     | An optional recipient address to restrict results to

## Mandrill.cancelScheduledEmail
Cancels a scheduled email.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| messageId| String     | A scheduled email id, as returned by any of the messages/send calls or messages/list-scheduled

## Mandrill.rescheduleScheduledEmail
Reschedules a scheduled email.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| messageId| String     | A scheduled email id, as returned by any of the messages/send calls or messages/list-scheduled
| sendAt   | DatePicker | The new date time when the message should sent. Mandrill can't time travel, so if you specify a time in past the message will be sent immediately

## Mandrill.getUserDefinedTagInfo
Return all of the user-defined tag information

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.deleteTag
Deletes a tag permanently. Deleting a tag removes the tag from any messages that have been sent, and also deletes the tag's stats. There is no way to undo this operation, so use it carefully.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| tag   | String     | Tag name

## Mandrill.getSingleTag
Return more detailed information about a single tag, including aggregates of recent stats

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| tag   | String     | Tag name

## Mandrill.getTagHistory
Return the recent history (hourly stats for the last 30 days) for a tag

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| tag   | String     | Tag name

## Mandrill.getAllTagsHistory
Return the recent history (hourly stats for the last 30 days) for all tags

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addEmailToRejectionBlacklist
Adds an email to your email rejection blacklist. Addresses that you add manually will never expire and there is no reputation penalty for removing them from your blacklist. Attempting to blacklist an address that has been whitelisted will have no effect.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key obtained from Mandrill
| email     | String     | Email address to block
| comment   | String     | Optional comment describing the rejection
| subaccount| String     | Optional unique identifier for the subaccount to limit the blacklist entry

## Mandrill.getEmailRejectionBlacklist
Retrieves your email rejection blacklist. You can provide an email address to limit the results. Returns up to 1000 results. By default, entries that have expired are excluded from the results

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Mandrill
| email         | String     | Optional email address to search by
| includeExpired| String     | Whether to include rejections that have already expired.n
| subaccount    | String     | Optional unique identifier for the subaccount to limit the blacklist entry

## Mandrill.deleteEmailRejection
Deletes an email rejection. There is no limit to how many rejections you can remove from your blacklist, but keep in mind that each deletion has an affect on your reputation.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Api key obtained from Mandrill
| email     | String     | Email address to block
| subaccount| String     | Optional unique identifier for the subaccount to limit the blacklist entry

## Mandrill.addEmailToRejectionWhitelist
Adds an email to your email rejection whitelist. If the address is currently on your blacklist, that blacklist entry will be removed automatically.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from Mandrill
| email  | String     | Email address to block
| comment| String     | Optional description of why the email was whitelisted

## Mandrill.getEmailRejectionWhitelist
Retrieves your email rejection whitelist. You can provide an email address or search prefix to limit the results. Returns up to 1000 results.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| email | String     | Optional email address to search by

## Mandrill.getSenderDomains
Returns the sender domains that have been added to this account.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addSenderDomain
Adds a sender domain to your account. Sender domains are added automatically as you send, but you can use this call to add them ahead of time.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.checkSenderDomain
Checks the SPF and DKIM settings for a domain. If you haven't already added this domain to your account, it will be added automatically.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.verifyDomain
Sends a verification email in order to verify ownership of a domain.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from Mandrill
| domain | String     | Domain name
| mailbox| String     | Mailbox at the domain where the verification email should be sent

## Mandrill.getSingleSender
Return more detailed information about a single sender, including aggregates of recent stats

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from Mandrill
| address| String     | Email address of the sender

## Mandrill.getSenderHistory
Return the recent history (hourly stats for the last 30 days) for a sender

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from Mandrill
| address| String     | Email address of the sender

## Mandrill.getMostClickedURLs
Get the 100 most clicked URLs

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.searchMostClickedURLs
Return the 100 most clicked URLs that match the search query given

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| query | String     | Search query

## Mandrill.getURLHistory
Return the 100 most clicked URLs that match the search query given

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| url   | String     | Existing URL

## Mandrill.getTrackingDomains
Get the list of tracking domains set up for this account

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addTrackingDomain
Add a tracking domain to your account

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.checkTrackingDomain
Checks the CNAME settings for a tracking domain. The domain must have been added already with the add-tracking-domain call.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.addTemplate
Add a new template

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| name     | String     | Template name
| fromName | String     | Default sending address for emails sent using this template
| fromEmail| String     | Default from name to be used
| subject  | String     | Default subject line to be used
| code     | String     | The HTML code for the template with mc:edit attributes for the editable elements
| text     | String     | Default text part to be used when sending with this template
| publish  | Boolean    | Set to false to add a draft template without publishing
| labels   | List       | Array. An optional array of up to 10 labels to use for filtering templates

## Mandrill.updateTemplate
Update existing template

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| name     | String     | Template name
| fromName | String     | Default sending address for emails sent using this template
| fromEmail| String     | Default from name to be used
| subject  | String     | Default subject line to be used
| code     | String     | The HTML code for the template with mc:edit attributes for the editable elements
| text     | String     | Default text part to be used when sending with this template
| publish  | Boolean    | Set to false to add a draft template without publishing
| labels   | List       | Array. An optional array of up to 10 labels to use for filtering templates

## Mandrill.getTemplateInfo
Get the information for an existing template

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| name  | String     | Template name

## Mandrill.publishTemplate
Publish the content for the template. Any new messages sent using this template will start using the content that was previously in draft.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| name  | String     | Template name

## Mandrill.getTemplateHistory
Return the recent history (hourly stats for the last 30 days) for a template

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| name  | String     | Template name

## Mandrill.renderTemplate
Inject content and optionally merge fields into a template, returning the HTML that results

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Mandrill
| templateName   | String     | Template name
| templateContent| String     | Array. Array of template content to render. Each item in the array should be a struct with two keys - name: the name of the content block to set the content for, and content: the actual content to put into the block
| mergeVars      | List       | Array. Optional merge variables to use for injecting merge field content. If this is not provided, no merge fields will be replaced

## Mandrill.deleteTemplate
Delete a template

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| name  | String     | Template name

## Mandrill.getAllWebhooks
Get the list of all webhooks defined on the account

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addWebhook
Add a new webhook

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| webhookUrl | String     | The URL to POST batches of events
| description| String     | An optional description of the webhook
| events     | List       | Array. An optional list of events that will be posted to the webhook

## Mandrill.getSingleWebhook
Given the ID of an existing webhook, return the data about it

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| webhookId| Number     | The unique identifier of a webhook belonging to this account

## Mandrill.updateWebhook
Update an existing webhook

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| webhookId  | Number     | The unique identifier of a webhook belonging to this account
| webhookUrl | String     | The URL to POST batches of events
| description| String     | An optional description of the webhook
| events     | List       | Array. An optional list of events that will be posted to the webhook

## Mandrill.deleteWebhook
Delete an existing webhook

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| webhookId| Number     | The unique identifier of a webhook belonging to this account

## Mandrill.getSubaccounts
Get the list of subaccounts defined for the account, optionally filtered by a prefix

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| query | String     | An optional prefix to filter the subaccounts' ids and names

## Mandrill.addSubaccount
Add a new subaccount

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| Api key obtained from Mandrill
| subaccountId         | String     | A unique identifier for the subaccount to be used in sending calls
| subaccountName       | String     | An optional display name to further identify the subaccount
| subaccountNotes      | String     | An optional extra text to associate with the subaccount
| subaccountCustomQuota| Number     | An optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation

## Mandrill.getSingleSubaccount
Given the ID of an existing subaccount, return the data about it

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| subaccountId| String     | A unique identifier for the subaccount to be used in sending calls

## Mandrill.updateSubaccount
Update an existing subaccount

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| Api key obtained from Mandrill
| subaccountId         | String     | A unique identifier of the subaccount to update
| subaccountName       | String     | An optional display name to further identify the subaccount
| subaccountNotes      | String     | An optional extra text to associate with the subaccount
| subaccountCustomQuota| Number     | An optional manual hourly quota for the subaccount. If not specified, Mandrill will manage this based on reputation

## Mandrill.pauseSubaccountSending
Pause a subaccount's sending. Any future emails delivered to this subaccount will be queued for a maximum of 3 days until the subaccount is resumed.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| subaccountId| String     | A unique identifier of the subaccount

## Mandrill.resumeSubaccountSending
Resume a paused subaccount's sending

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| subaccountId| String     | A unique identifier of the subaccount

## Mandrill.deleteSubaccount
Delete an existing subaccount. Any email related to the subaccount will be saved, but stats will be removed and any future sending calls to this subaccount will fail.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| subaccountId| String     | A unique identifier of the subaccount

## Mandrill.getInboundDomains
List the domains that have been configured for inbound delivery.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addInboundDomain
Add an inbound domain to your account

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.checkInboundDomain
Check the MX settings for an inbound domain. The domain must have already been added with the add-domain call

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.getInboundMailboxRoutes
List the mailbox routes defined for an inbound domain

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.addInboundMailboxRoute
Add a new mailbox route to an inbound domain

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| domain  | String     | Domain name
| pattern | String     | The search pattern that the mailbox name should match
| routeUrl| String     | The webhook URL where the inbound messages will be published

## Mandrill.updateInboundMailboxRoute
Update the pattern or webhook of an existing inbound mailbox route. If null is provided for any fields, the values will remain unchanged.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| routeId | String     | Id of the route
| pattern | String     | The search pattern that the mailbox name should match
| routeUrl| String     | The webhook URL where the inbound messages will be published

## Mandrill.deleteInboundMailboxRoute
Delete an existing inbound mailbox route

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from Mandrill
| routeId| String     | Id of the route

## Mandrill.sendInboundRaw
Take a raw MIME document destined for a domain with inbound domains set up, and send it to the inbound hook exactly as if it had been sent over SMTP

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Mandrill
| rawMessage   | String     | The full MIME document of an email message
| to           | String     | Array. Optionally define the recipients to receive the message - otherwise we'll use the To, Cc, and Bcc headers provided in the document
| fromEmail    | String     | The address specified in the MAIL FROM stage of the SMTP conversation. Required for the SPF check.
| helo         | String     | The identification provided by the client mta in the MTA state of the SMTP conversation. Required for the SPF check.
| clientAddress| String     | The remote MTA's ip address. Optional; required for the SPF check.

## Mandrill.deleteInboundDomain
Delete an inbound domain from the account. All mail will stop routing for this domain immediately.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| domain| String     | Domain name

## Mandrill.getAllExports
Returns a list of your exports.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.startRejectionBlacklistExport
Begins an export of your rejection blacklist. The blacklist will be exported to a zip archive containing a single file named rejects.csv that includes the following fields: email, reason, detail, created_at, expires_at, last_event_at, expires_at.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| notifyEmail| String     | An optional email address to notify when the export job has finished.

## Mandrill.getExportJob
Returns information about an export job. If the export job's state is 'complete', the returned data will include a URL you can use to fetch the results. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| exportJobId| String     | Export job identifier

## Mandrill.startRejectionWhitelistExport
Begins an export of your rejection whitelist. The whitelist will be exported to a zip archive containing a single file named whitelist.csv that includes the following fields: email, detail, created_at.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| notifyEmail| String     | An optional email address to notify when the export job has finished.

## Mandrill.startActivityHistoryExport
Begins an export of your activity history. The activity will be exported to a zip archive containing a single file named activity.csv in the same format as you would be able to export from your account's activity view. It includes the following fields: Date, Email Address, Sender, Subject, Status, Tags, Opens, Clicks, Bounce Detail. If you have configured any custom metadata fields, they will be included in the exported data.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| notifyEmail| String     | An optional email address to notify when the export job has finished.
| dateFrom   | DatePicker | Start date as a UTC string in YYYY-MM-DD HH:MM:SS format
| dateTo     | DatePicker | End date as a UTC string in YYYY-MM-DD HH:MM:SS format
| tags       | List       | Array. An array of tag names to narrow the export to; will match messages that contain ANY of the tags
| senders    | List       | Array. An array of senders to narrow the export to
| states     | List       | Array. An array of states to narrow the export to; messages with ANY of the states will be included (sent, rejected, bounced, soft-bounced, spam, unsub)
| apiKeys    | List       | Array. An array of api keys to narrow the export to; messsagse sent with ANY of the keys will be included

## Mandrill.getMyDedicatedIPs
Lists your dedicated IPs.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.getSingleDedicatedIP
Retrieves information about a single dedicated ip.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address

## Mandrill.requestDedicatedIP
Requests an additional dedicated IP for your account. Accounts may have one outstanding request at any time, and provisioning requests are processed within 24 hours.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill
| warmup| Boolean    | Whether to enable warmup mode for the ip
| pool  | String     | The id of the pool to add the dedicated ip to, or null to use your account's default pool

## Mandrill.startWarmupForDedicatedIP
Begins the warmup process for a dedicated IP. During the warmup process, Mandrill will gradually increase the percentage of your mail that is sent over the warming-up IP, over a period of roughly 30 days. The rest of your mail will be sent over shared IPs or other dedicated IPs in the same pool.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address

## Mandrill.cancelWarmupForDedicatedIP
Cancels the warmup process for a dedicated IP.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address

## Mandrill.movesDedicatedIP
Moves a dedicated IP to a different pool.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Mandrill
| ipAddress  | String     | Dedicated IP address
| addressPool| String     | Name of the new pool to add the dedicated ip to
| createPool | Boolean    | Whether to create the pool if it does not exist; if false and the pool does not exist, an Unknown_Pool will be thrown.

## Mandrill.deleteDedicatedIP
Deletes a dedicated IP. This is permanent and cannot be undone.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address

## Mandrill.getMyDedicatedIpPools
Lists your dedicated IP pools.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.createPool
Creates a pool and returns it. If a pool already exists with this name, no action will be performed.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| poolName| String     | Name of a pool to create

## Mandrill.getSingleDedicatedIpPool
Describes a single dedicated IP pool.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| poolName| String     | Name of a pool

## Mandrill.deletePool
Deletes a pool. A pool must be empty before you can delete it, and you cannot delete your default pool.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Mandrill
| poolName| String     | Name of a pool

## Mandrill.checkCustomDNS
Tests whether a domain name is valid for use as the custom reverse DNS for a dedicated IP.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address
| domain   | String     | Domain name to test

## Mandrill.setCustomDNS
Configures the custom DNS name for a dedicated IP.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| ipAddress| String     | Dedicated IP address
| domain   | String     | Domain name to set

## Mandrill.getCustomMetadataFields
Get the list of custom metadata fields indexed for the account.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Api key obtained from Mandrill

## Mandrill.addCustomMetadataField
Add a new custom metadata field to be indexed for the account.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| fieldName   | String     | Unique identifier for the metadata field
| viewTemplate| String     | Mustache template to control how the metadata is rendered in your activity log

## Mandrill.updateCustomMetadataField
Update an existing custom metadata field.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Mandrill
| fieldName   | String     | Unique identifier for the metadata field
| viewTemplate| String     | Mustache template to control how the metadata is rendered in your activity log

## Mandrill.deleteCustomMetadataField
Delete an existing custom metadata field.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Api key obtained from Mandrill
| fieldName| String     | Unique identifier for the metadata field

