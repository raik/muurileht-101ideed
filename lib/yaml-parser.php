<?php

// http://runnable.com/VKzXbql-B9k-I86w/yaml-front-matter-simple-parser-w-o-lib-dependencies-for-php

/**
 * Parses a KB article w/ possible YAML front matter.
 *
 * @param string $article Input article content to parse.
 *
 * @return array An array with two elements.
 *    - `headers` An associative array of all YAML headers.
 *    - `body` The body part of the article after YAML headers were parsed.
 */
function parse_article($article)
{
  // Initialize parts to return here.
  $parts = array(
    'headers' => array(),
    'body'    => '',
  );
  // Normalize line breaks. Use "\n" for all line breaks.
  // e.g. convert old Mac-style line breaks, or Windows-style line breaks.
  // See also: <http://en.wikipedia.org/wiki/Newline>
  $article = str_replace(array("\r\n", "\r"), "\n", $article);
  $article = trim($article); // Trim any leading/trailing whitespace.

  // If the article does NOT start with `---` (on its own line), it contains no YAML front matter.
  // In this case, we should return the full article as the body. There are no headers.
  if(strpos($article, '---'."\n") !== 0)
  {
    $parts['body'] = $article;
    return $parts;
  }
  // Split on lines that contain only `---`.
  // We expect two lines that contain only `---` for a total of three string parts.

  // Note that Markdown allows for `---` also, so the check above is important;
  //    i.e. the article must start with `---` on a separate line for us to get here.
  $article_parts = preg_split('/^\-{3}$/m', $article, 3);

  // If the article does NOT have three parts, it contains no YAML front matter.
  // In this case, we should return the full article as the body. There are no headers.
  if(count($article_parts) !== 3)
  {
    $parts['body'] = $article;
    return $parts;
  }
  // Assign each of the parts; giving them proper names here to make it easier to work with.
  // Note that the first part in this array is the part before the first `---`; which is useless to us.
  list(, $article_headers_part, $article_body_part) = $article_parts;

  foreach(explode("\n", trim($article_headers_part)) as $_line) // Iterate lines in the headers part.
  {
    if(!($_line = trim($_line))) // Trim this line.
      continue; // Skip over empty lines; i.e. with whitespace only.

    if(strpos($_line, ':', 1) !== FALSE)
    { // If this line contains `:` with at least one char in front of `:`.
      list($_name, $_value) = explode(':', $_line, 2); // Break `name: value` into two parts.
      $parts['headers'][strtolower(trim($_name))] = trim($_value); // Add it to the array of headers.
    }
  }
  unset($_line, $_name, $_value); // Housekeeping.

  $parts['body'] = trim($article_body_part); // Trim the body part parsed above already, and include it in the return array.

  return $parts;
}

?>