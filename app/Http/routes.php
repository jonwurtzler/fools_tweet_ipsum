<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->group(['prefix' => 'admin'], function () use ($app) {
  $app->get('users', function ()    {
    // Matches The "/admin/users" URL
  });
});

/**
 * Needed routes
 * /
 * /word
 * /words
 * /words/{wordCount}
 * /words/{wordCount}/category/{category}
 * /words/{wordCount}/feed/{feedName}
 *
 * /sentence
 * /sentences
 * /sentences/{sentenceCount}
 * /sentences/{sentenceCount}/category/{category}
 * /sentences/{sentenceCount}/feed/{feedName}
 *
 * /paragraph
 * /paragraphs
 * /paragraphs/{paragraphCount}
 * /paragraphs/{paragraphCount}/sentences/{sentenceCount}
 * /paragraphs/{paragraphCount}/sentences/{sentenceCount}/category/{category}
 * /paragraphs/{paragraphCount}/sentences/{sentenceCount}/feed/{feedName}
 */

/**
 * Words
 */
$app->get('/', 'WordController@word');
$app->get('/word', 'WordController@word');
$app->get('/words', 'WordController@words');
$app->get('/words/{wordCount}', 'WordController@words');
$app->get('/words/{wordCount}/category/{category}', 'WordController@categoryWords');
$app->get('/words/{wordCount}/feed/{feedName}', 'WordController@feedWords');

/**
 * Sentences
 */
$app->get('/sentence', 'SentenceController@sentence');
$app->get('/sentences', 'SentenceController@sentences');
$app->get('/sentences/{sentenceCount}', 'SentenceController@sentences');
$app->get('/sentences/{sentenceCount}/category/{category}', 'SentenceController@categorySentences');
$app->get('/sentences/{sentenceCount}/feed/{feedName}', 'SentenceController@feedSentences');

/**
 * Paragraphs
 */
$app->get('/paragraph', 'ParagraphController@paragraph');
$app->get('/paragraphs', 'ParagraphController@paragraphs');
$app->get('/paragraphs/{paragraphCount}', 'ParagraphController@paragraphs');
$app->get('/paragraphs/{paragraphCount}/sentences/{sentenceCount}', 'ParagraphController@paragraphs');
$app->get('/paragraphs/{paragraphCount}/sentences/{sentenceCount}/category/{category}', 'ParagraphController@categoryParagraphs');
$app->get('/paragraphs/{paragraphCount}/sentences/{sentenceCount}/feed/{feedName}', 'ParagraphController@feedParagraphs');
