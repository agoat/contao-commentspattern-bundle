# Comments Pattern
####Contao 4 contentblocks extension to add comments to content blocks
---

###Installation:

Use composer to add package to your framework
```
composer require agoat/commentspattern-bundle
```

Add to app/AppKernel.php (after 'new Contao\CoreBundle\ContaoCoreBundle()')
```
new Agoat\CommentsPatternBundle\AgoatCommentsPatternBundle()
```
