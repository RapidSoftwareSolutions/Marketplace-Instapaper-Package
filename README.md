[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Instapaper/functions?utm_source=RapidAPIGitHub_InstapaperFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Instapaper Package
Instapaper is the best way to save and read web content. 
* Domain: [instapaper.com](http://www.instapaper.com)
* Credentials: customerKey, customerSecret

## How to get credentials: 
1. Sign in [instagram.com](https://www.instagram.com/)
2. Register [new application](https://www.instapaper.com/main/request_oauth_consumer_token)
 
## Instapaper.getAccessToken
Gets an OAuth access token for a user.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| username      | String     | The user's username.
| password      | String     | The user's password, if the account has one.

## Instapaper.getUnreadBookmarks
Lists the user's unread bookmarks, and can also synchronize reading positions.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| limit         | Number     | A number between 1 and 500, default 25.
| folderId      | String     | Possible values are unread (default), starred, archive, or a folder_id value from /api/1.1/folders/list.
| have          | String     | A concatenation of bookmark_id values that the client already has from the specified folder. See below.
| highlights    | String     | Optional. A '-' delimited list of highlight IDs that the client already has from the specified bookmarks.

## Instapaper.updateReadingProgress
Updates the user's reading progress on a single article.

| Field            | Type              | Description
|------------------|-------------------|----------
| customerKey      | credentials       | Your customer key.
| customerSecret   | credentials       | Your customer secret.
| token            | String            | Your OAUth 1 token.
| tokenSecret      | String            | Your OAUth 1 token secret.
| bookmarkId       | String            | The bookmark to update.
| progress         | String            | The user's progress, as a floating-point number between 0.0 and 1.0, defined as the top edge of the user's current viewport, expressed as a percentage of the article's total length.
| progressTimestamp| DatePicker| The Unix timestamp value of the time that the progress was recorded.

## Instapaper.addBookmark
Adds a new unread bookmark to the user's account.

| Field          | Type       | Description
|----------------|------------|----------
| customerKey    | credentials| Your customer key.
| customerSecret | credentials| Your customer secret.
| token          | String     | Your OAUth 1 token.
| tokenSecret    | String     | Your OAUth 1 token secret.
| url            | String     | The bookmark url.
| title          | String     | If omitted or empty, the title will be looked up by Instapaper synchronously. This will delay the action, so please specify the title if you have it.
| description    | String     | A brief, plaintext description or summary of the article. Twitter clients often put the source tweet's text here, and Instapaper's bookmarklet puts the selected text here if the user has selected any.
| folderId       | String     | Folder ID as returned by the folders/list method described below.
| resolveFinalUrl| Select     | Specify 1 if the url might not be the final URL that a browser would resolve when fetching it, such as if it's a shortened URL, it's a URL from an RSS feed that might be proxied, or it's likely to go through any other redirection when viewed in a browser. This will cause Instapaper to attempt to resolve all redirects itself, synchronously. This will delay the action, so please specify 0 for this parameter if you're reasonably confident that this URL won't be redirected, such as if it's already being viewed in a web browser.

## Instapaper.deleteBookmark
Permanently deletes the specified bookmark. This is NOT the same as Archive. Please be clear to users if you're going to do this.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.starsBookmark
Stars the specified bookmark.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.unstarsBookmark
Un-stars the specified bookmark.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.archiveBookmark
Moves the specified bookmark to the Archive.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.unarchiveBookmark
Moves the specified bookmark to the top of the Unread folder.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.moveBookmark
Moves the specified bookmark to a user-created folder.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.
| folderId      | String     | Folder id.

## Instapaper.getBookmarkText
Returns the specified bookmark's processed text-view HTML, which is always text/html encoded as UTF-8.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | The bookmark url.

## Instapaper.getAllFolders
A list of the account's user-created folders. This only includes organizational folders and does not include RSS-feed folders or starred-subscription folders, as the implementation of those is changing in the near future.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.

## Instapaper.createFolder
Creates an organizational folder.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| title         | String     | Folder name.

## Instapaper.deleteFolder
Deletes the folder and moves any articles in it to the Archive.

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| folderId      | String     | Folder id.

## Instapaper.orderFolder
Re-orders a user's folders.

| Field         | Type            | Description
|---------------|-----------------|----------
| customerKey   | credentials     | Your customer key.
| customerSecret| credentials     | Your customer secret.
| token         | String          | Your OAUth 1 token.
| tokenSecret   | String          | Your OAUth 1 token secret.
| order         | List| folder_id:position pairs list

## Instapaper.getBookmarkHighlights
List highlights for bookmarkId

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | Bookmark id

## Instapaper.createBookmarkHighlight
Create a new highlight for bookmarkId

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| bookmarkId    | String     | Bookmark id
| text          | String     | The text for the highlight.
| position      | Number     | The 0-indexed position of text in the content. Defaults to 0.

## Instapaper.deleteBookmarkHighlight
Delete a highlight

| Field         | Type       | Description
|---------------|------------|----------
| customerKey   | credentials| Your customer key.
| customerSecret| credentials| Your customer secret.
| token         | String     | Your OAUth 1 token.
| tokenSecret   | String     | Your OAUth 1 token secret.
| highlightId   | String     | Highlight id

