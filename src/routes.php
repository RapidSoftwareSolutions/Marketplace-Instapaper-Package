<?php
$routes = [
    'metadata',
    'getAccessToken',
    'getUnreadBookmarks',
    'updateReadingProgress',
    'addBookmark',
    'deleteBookmark',
    'starsBookmark',
    'unstarsBookmark',
    'archiveBookmark',
    'unarchiveBookmark',
    'moveBookmark',
    'getBookmarkText',
    'getAllFolders',
    'createFolder',
    'deleteFolder',
    'orderFolder',
    'getBookmarkHighlights',
    'createBookmarkHighlight',
    'deleteBookmarkHighlight'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

