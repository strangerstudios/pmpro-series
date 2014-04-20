




<!DOCTYPE html>
<html class="   ">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
    <title>wordpress-settings-api-class/class.settings-api.php at master · tareq1988/wordpress-settings-api-class</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <meta property="fb:app_id" content="1401488693436528"/>

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="tareq1988/wordpress-settings-api-class" name="twitter:title" /><meta content="wordpress-settings-api-class - A PHP class abstraction that removes all the headaches of the WordPress settings API under the hood and builds a nice options panel on the fly." name="twitter:description" /><meta content="https://avatars1.githubusercontent.com/u/153669?s=400" name="twitter:image:src" />
<meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://avatars1.githubusercontent.com/u/153669?s=400" property="og:image" /><meta content="tareq1988/wordpress-settings-api-class" property="og:title" /><meta content="https://github.com/tareq1988/wordpress-settings-api-class" property="og:url" /><meta content="wordpress-settings-api-class - A PHP class abstraction that removes all the headaches of the WordPress settings API under the hood and builds a nice options panel on the fly." property="og:description" />

    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />

    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="183ED3B9:2231:7C99380:53532102" name="octolytics-dimension-request_id" /><meta content="5167506" name="octolytics-actor-id" /><meta content="eighty20results" name="octolytics-actor-login" /><meta content="ccb8443062b84e66b7e70bb964b0e2c1dccc4949947206b40a16358e6dd6e0e3" name="octolytics-actor-hash" />
    

    
    
    <link rel="icon" type="image/x-icon" href="https://github.global.ssl.fastly.net/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="ffd1V/aclWum9uKqZ4QgLuQ/b1su4qW7Nj0mLXc087c=" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-96f104cca04e50f916e268ebf2d3f7b009e1405e.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-dcc4741ab191e42d5f0e7bc8107928d3afedb6ed.css" media="all" rel="stylesheet" type="text/css" />
    


        <script crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/frameworks-f8f8d8ee1afb4365ba5e002fdbc3c8e61738713b.js" type="text/javascript"></script>
        <script async="async" crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/github-3d40051ee9deef4dcbac4b258559962e1ff08bc6.js" type="text/javascript"></script>
        
        
      <meta http-equiv="x-pjax-version" content="c89c1dd3e1fde5b439c014fbbfb28b96">

        <link data-pjax-transient rel='permalink' href='/tareq1988/wordpress-settings-api-class/blob/c066544b9f17e02e59edc5ef3a24ce7bf8f0b13a/class.settings-api.php'>

  <meta name="description" content="wordpress-settings-api-class - A PHP class abstraction that removes all the headaches of the WordPress settings API under the hood and builds a nice options panel on the fly." />

  <meta content="153669" name="octolytics-dimension-user_id" /><meta content="tareq1988" name="octolytics-dimension-user_login" /><meta content="4576492" name="octolytics-dimension-repository_id" /><meta content="tareq1988/wordpress-settings-api-class" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="4576492" name="octolytics-dimension-repository_network_root_id" /><meta content="tareq1988/wordpress-settings-api-class" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/tareq1988/wordpress-settings-api-class/commits/master.atom" rel="alternate" title="Recent Commits to wordpress-settings-api-class:master" type="application/atom+xml" />

  </head>


  <body class="logged_in  env-production macintosh vis-public page-blob">
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>
    <div class="wrapper">
      
      
      
      


      <div class="header header-logged-in true">
  <div class="container clearfix">

    <a class="header-logo-invertocat" href="https://github.com/">
  <span class="mega-octicon octicon-mark-github"></span>
</a>

    
    <a href="/notifications" aria-label="You have no unread notifications" class="notification-indicator tooltipped tooltipped-s" data-gotokey="n">
        <span class="mail-status all-read"></span>
</a>

      <div class="command-bar js-command-bar  in-repository">
          <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<div class="commandbar">
  <span class="message"></span>
  <input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    data-username="eighty20results"
      data-repo="tareq1988/wordpress-settings-api-class"
      data-branch="master"
      data-sha="f82eff56938a771d40c6438d183a788c45125d72"
  >
  <div class="display hidden"></div>
</div>

    <input type="hidden" name="nwo" value="tareq1988/wordpress-settings-api-class" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target" role="button" aria-haspopup="true">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container" aria-hidden="true">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="help tooltipped tooltipped-s" aria-label="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
        <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
            <li><a href="https://gist.github.com">Gist</a></li>
            <li><a href="/blog">Blog</a></li>
          <li><a href="https://help.github.com">Help</a></li>
        </ul>
      </div>

    


  <ul id="user-links">
    <li>
      <a href="/eighty20results" class="name">
        <img alt="Thomas Sjolshagen" class=" js-avatar" data-user="5167506" height="20" src="https://avatars1.githubusercontent.com/u/5167506?s=140" width="20" /> eighty20results
      </a>
    </li>

    <li class="new-menu dropdown-toggle js-menu-container">
      <a href="#" class="js-menu-target tooltipped tooltipped-s" aria-label="Create new...">
        <span class="octicon octicon-plus"></span>
        <span class="dropdown-arrow"></span>
      </a>

      <div class="new-menu-content js-menu-content">
      </div>
    </li>

    <li>
      <a href="/settings/profile" id="account_settings"
        class="tooltipped tooltipped-s"
        aria-label="Account settings ">
        <span class="octicon octicon-tools"></span>
      </a>
    </li>
    <li>
      <form class="logout-form" action="/logout" method="post">
        <button class="sign-out-button tooltipped tooltipped-s" aria-label="Sign out">
          <span class="octicon octicon-log-out"></span>
        </button>
      </form>
    </li>

  </ul>

<div class="js-new-dropdown-contents hidden">
  

<ul class="dropdown-menu">
  <li>
    <a href="/new"><span class="octicon octicon-repo-create"></span> New repository</a>
  </li>
  <li>
    <a href="/organizations/new"><span class="octicon octicon-organization"></span> New organization</a>
  </li>


    <li class="section-title">
      <span title="tareq1988/wordpress-settings-api-class">This repository</span>
    </li>
      <li>
        <a href="/tareq1988/wordpress-settings-api-class/issues/new"><span class="octicon octicon-issue-opened"></span> New issue</a>
      </li>
</ul>

</div>


    
  </div>
</div>

      

        



      <div id="start-of-content" class="accessibility-aid"></div>
          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">

    <li class="subscription">
      <form accept-charset="UTF-8" action="/notifications/subscribe" class="js-social-container" data-autosubmit="true" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="ffd1V/aclWum9uKqZ4QgLuQ/b1su4qW7Nj0mLXc087c=" /></div>  <input id="repository_id" name="repository_id" type="hidden" value="4576492" />

    <div class="select-menu js-menu-container js-select-menu">
      <a class="social-count js-social-count" href="/tareq1988/wordpress-settings-api-class/watchers">
        18
      </a>
      <span class="minibutton select-menu-button with-count js-menu-target" role="button" tabindex="0" aria-haspopup="true">
        <span class="js-select-button">
          <span class="octicon octicon-eye-watch"></span>
          Watch
        </span>
      </span>

      <div class="select-menu-modal-holder">
        <div class="select-menu-modal subscription-menu-modal js-menu-content" aria-hidden="true">
          <div class="select-menu-header">
            <span class="select-menu-title">Notification status</span>
            <span class="octicon octicon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-list js-navigation-container" role="menu">

            <div class="select-menu-item js-navigation-item selected" role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input checked="checked" id="do_included" name="do" type="radio" value="included" />
                <h4>Not watching</h4>
                <span class="description">You only receive notifications for conversations in which you participate or are @mentioned.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-watch"></span>
                  Watch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_subscribed" name="do" type="radio" value="subscribed" />
                <h4>Watching</h4>
                <span class="description">You receive notifications for all conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-unwatch"></span>
                  Unwatch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_ignore" name="do" type="radio" value="ignore" />
                <h4>Ignoring</h4>
                <span class="description">You do not receive any notifications for conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-mute"></span>
                  Stop ignoring
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

</form>
    </li>

  <li>
  

  <div class="js-toggler-container js-social-container starring-container ">
    <a href="/tareq1988/wordpress-settings-api-class/unstar"
      class="minibutton with-count js-toggler-target star-button starred"
      aria-label="Unstar this repository" title="Unstar tareq1988/wordpress-settings-api-class" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star-delete"></span><span class="text">Unstar</span>
    </a>

    <a href="/tareq1988/wordpress-settings-api-class/star"
      class="minibutton with-count js-toggler-target star-button unstarred"
      aria-label="Star this repository" title="Star tareq1988/wordpress-settings-api-class" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star"></span><span class="text">Star</span>
    </a>

      <a class="social-count js-social-count" href="/tareq1988/wordpress-settings-api-class/stargazers">
        129
      </a>
  </div>

  </li>


        <li>
          <a href="/tareq1988/wordpress-settings-api-class/fork" class="minibutton with-count js-toggler-target fork-button lighter tooltipped-n" title="Fork your own copy of tareq1988/wordpress-settings-api-class to your account" aria-label="Fork your own copy of tareq1988/wordpress-settings-api-class to your account" rel="nofollow" data-method="post">
            <span class="octicon octicon-git-branch-create"></span><span class="text">Fork</span>
          </a>
          <a href="/tareq1988/wordpress-settings-api-class/network" class="social-count">35</a>
        </li>


</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author"><a href="/tareq1988" class="url fn" itemprop="url" rel="author"><span itemprop="title">tareq1988</span></a></span><!--
       --><span class="path-divider">/</span><!--
       --><strong><a href="/tareq1988/wordpress-settings-api-class" class="js-current-repository js-repo-home-link">wordpress-settings-api-class</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      <div class="repository-with-sidebar repo-container new-discussion-timeline js-new-discussion-timeline  ">
        <div class="repository-sidebar clearfix">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped tooltipped-w" aria-label="Code">
        <a href="/tareq1988/wordpress-settings-api-class" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /tareq1988/wordpress-settings-api-class">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped tooltipped-w" aria-label="Issues">
          <a href="/tareq1988/wordpress-settings-api-class/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /tareq1988/wordpress-settings-api-class/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>4</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped tooltipped-w" aria-label="Pull Requests">
        <a href="/tareq1988/wordpress-settings-api-class/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /tareq1988/wordpress-settings-api-class/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


        <li class="tooltipped tooltipped-w" aria-label="Wiki">
          <a href="/tareq1988/wordpress-settings-api-class/wiki" aria-label="Wiki" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_wiki /tareq1988/wordpress-settings-api-class/wiki">
            <span class="octicon octicon-book"></span> <span class="full-word">Wiki</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>
    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped tooltipped-w" aria-label="Pulse">
        <a href="/tareq1988/wordpress-settings-api-class/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /tareq1988/wordpress-settings-api-class/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Graphs">
        <a href="/tareq1988/wordpress-settings-api-class/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /tareq1988/wordpress-settings-api-class/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Network">
        <a href="/tareq1988/wordpress-settings-api-class/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /tareq1988/wordpress-settings-api-class/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

              <div class="only-with-full-nav">
                

  

<div class="clone-url "
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/tareq1988/wordpress-settings-api-class.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/tareq1988/wordpress-settings-api-class.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url open"
  data-protocol-type="ssh"
  data-url="/users/set_protocol?protocol_selector=ssh&amp;protocol_type=clone">
  <h3><strong>SSH</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="git@github.com:tareq1988/wordpress-settings-api-class.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="git@github.com:tareq1988/wordpress-settings-api-class.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/tareq1988/wordpress-settings-api-class" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/tareq1988/wordpress-settings-api-class" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>,
      <a href="#" class="js-clone-selector" data-protocol="ssh">SSH</a>,
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="help tooltipped tooltipped-n" aria-label="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>

  <a href="http://mac.github.com" data-url="github-mac://openRepo/https://github.com/tareq1988/wordpress-settings-api-class" class="minibutton sidebar-button js-conduit-rewrite-url" title="Save tareq1988/wordpress-settings-api-class to your computer and use it in GitHub Desktop." aria-label="Save tareq1988/wordpress-settings-api-class to your computer and use it in GitHub Desktop.">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>


                <a href="/tareq1988/wordpress-settings-api-class/archive/master.zip"
                   class="minibutton sidebar-button"
                   aria-label="Download tareq1988/wordpress-settings-api-class as a zip file"
                   title="Download tareq1988/wordpress-settings-api-class as a zip file"
                   rel="nofollow">
                  <span class="octicon octicon-cloud-download"></span>
                  Download ZIP
                </a>
              </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:3db835659f5c6a5f6c0311c0d6d8ff2f -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/tareq1988/wordpress-settings-api-class/find/master" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="master"
    role="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">master</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/tareq1988/wordpress-settings-api-class/blob/master/class.settings-api.php"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/tareq1988/wordpress-settings-api-class" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">wordpress-settings-api-class</span></a></span></span><span class="separator"> / </span><strong class="final-path">class.settings-api.php</strong> <span aria-label="copy to clipboard" class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="class.settings-api.php" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


  <div class="commit file-history-tease">
    <img alt="Tareq Hasan" class="main-avatar js-avatar" data-user="153669" height="24" src="https://avatars2.githubusercontent.com/u/153669?s=140" width="24" />
    <span class="author"><a href="/tareq1988" rel="author">tareq1988</a></span>
    <local-time datetime="2014-01-08T12:29:44+06:00" from="now" title-format="%Y-%m-%d %H:%M:%S %z" title="2014-01-08 12:29:44 +0600">January 08, 2014</local-time>
    <div class="commit-title">
        <a href="/tareq1988/wordpress-settings-api-class/commit/56d9949b797aaef37cc404e9f9054711444bda63" class="message" data-pjax="true" title="enqueued thickbox style as it was not loading the thickbox">enqueued thickbox style as it was not loading the thickbox</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>7</strong>  contributors</a></p>
          <a class="avatar tooltipped tooltipped-s" aria-label="tareq1988" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=tareq1988"><img alt="Tareq Hasan" class=" js-avatar" data-user="153669" height="20" src="https://avatars2.githubusercontent.com/u/153669?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="rinatkhaziev" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=rinatkhaziev"><img alt="Rinat K" class=" js-avatar" data-user="459254" height="20" src="https://avatars0.githubusercontent.com/u/459254?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="jeremyclark13" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=jeremyclark13"><img alt="Jeremy Clark" class=" js-avatar" data-user="744783" height="20" src="https://avatars0.githubusercontent.com/u/744783?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="candypaint" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=candypaint"><img alt="candypaint" class=" js-avatar" data-user="2077407" height="20" src="https://avatars1.githubusercontent.com/u/2077407?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="bearded-avenger" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=bearded-avenger"><img alt="Nick Haskins" class=" js-avatar" data-user="1317303" height="20" src="https://avatars2.githubusercontent.com/u/1317303?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="daankortenbach" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=daankortenbach"><img alt="Daan Kortenbach" class=" js-avatar" data-user="947399" height="20" src="https://avatars1.githubusercontent.com/u/947399?s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="herewithme" href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php?author=herewithme"><img alt="Amaury Balmer" class=" js-avatar" data-user="898608" height="20" src="https://avatars0.githubusercontent.com/u/898608?s=140" width="20" /></a>


    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list">
          <li class="facebox-user-list-item">
            <img alt="Tareq Hasan" class=" js-avatar" data-user="153669" height="24" src="https://avatars2.githubusercontent.com/u/153669?s=140" width="24" />
            <a href="/tareq1988">tareq1988</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="Rinat K" class=" js-avatar" data-user="459254" height="24" src="https://avatars0.githubusercontent.com/u/459254?s=140" width="24" />
            <a href="/rinatkhaziev">rinatkhaziev</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="Jeremy Clark" class=" js-avatar" data-user="744783" height="24" src="https://avatars0.githubusercontent.com/u/744783?s=140" width="24" />
            <a href="/jeremyclark13">jeremyclark13</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="candypaint" class=" js-avatar" data-user="2077407" height="24" src="https://avatars1.githubusercontent.com/u/2077407?s=140" width="24" />
            <a href="/candypaint">candypaint</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="Nick Haskins" class=" js-avatar" data-user="1317303" height="24" src="https://avatars2.githubusercontent.com/u/1317303?s=140" width="24" />
            <a href="/bearded-avenger">bearded-avenger</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="Daan Kortenbach" class=" js-avatar" data-user="947399" height="24" src="https://avatars1.githubusercontent.com/u/947399?s=140" width="24" />
            <a href="/daankortenbach">daankortenbach</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="Amaury Balmer" class=" js-avatar" data-user="898608" height="24" src="https://avatars0.githubusercontent.com/u/898608?s=140" width="24" />
            <a href="/herewithme">herewithme</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file-box">
  <div class="file">
    <div class="meta clearfix">
      <div class="info file-name">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">executable file</span>
        <span class="meta-divider"></span>
          <span>525 lines (440 sloc)</span>
          <span class="meta-divider"></span>
        <span>18.54 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped tooltipped-w js-conduit-openfile-check"
               href="http://mac.github.com"
               data-url="github-mac://openRepo/https://github.com/tareq1988/wordpress-settings-api-class?branch=master&amp;filepath=class.settings-api.php"
               aria-label="Open this file in GitHub for Mac"
               data-failed-title="Your version of GitHub for Mac is too old to open this file. Try checking for updates.">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
                <a class="minibutton tooltipped tooltipped-n js-update-url-with-hash"
                   aria-label="Clicking this button will automatically fork this project so you can edit the file"
                   href="/tareq1988/wordpress-settings-api-class/edit/master/class.settings-api.php"
                   data-method="post" rel="nofollow">Edit</a>
          <a href="/tareq1988/wordpress-settings-api-class/raw/master/class.settings-api.php" class="button minibutton " id="raw-url">Raw</a>
            <a href="/tareq1988/wordpress-settings-api-class/blame/master/class.settings-api.php" class="button minibutton js-update-url-with-hash">Blame</a>
          <a href="/tareq1988/wordpress-settings-api-class/commits/master/class.settings-api.php" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->

            <a class="minibutton danger empty-icon tooltipped tooltipped-s"
               href="/tareq1988/wordpress-settings-api-class/delete/master/class.settings-api.php"
               aria-label="Fork this project and delete file"
               data-method="post" data-test-id="delete-blob-file" rel="nofollow">

          Delete
        </a>
      </div><!-- /.actions -->
    </div>
        <div class="blob-wrapper data type-php js-blob-data">
        <table class="file-code file-diff tab-size-8">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
<span id="L302" rel="#L302">302</span>
<span id="L303" rel="#L303">303</span>
<span id="L304" rel="#L304">304</span>
<span id="L305" rel="#L305">305</span>
<span id="L306" rel="#L306">306</span>
<span id="L307" rel="#L307">307</span>
<span id="L308" rel="#L308">308</span>
<span id="L309" rel="#L309">309</span>
<span id="L310" rel="#L310">310</span>
<span id="L311" rel="#L311">311</span>
<span id="L312" rel="#L312">312</span>
<span id="L313" rel="#L313">313</span>
<span id="L314" rel="#L314">314</span>
<span id="L315" rel="#L315">315</span>
<span id="L316" rel="#L316">316</span>
<span id="L317" rel="#L317">317</span>
<span id="L318" rel="#L318">318</span>
<span id="L319" rel="#L319">319</span>
<span id="L320" rel="#L320">320</span>
<span id="L321" rel="#L321">321</span>
<span id="L322" rel="#L322">322</span>
<span id="L323" rel="#L323">323</span>
<span id="L324" rel="#L324">324</span>
<span id="L325" rel="#L325">325</span>
<span id="L326" rel="#L326">326</span>
<span id="L327" rel="#L327">327</span>
<span id="L328" rel="#L328">328</span>
<span id="L329" rel="#L329">329</span>
<span id="L330" rel="#L330">330</span>
<span id="L331" rel="#L331">331</span>
<span id="L332" rel="#L332">332</span>
<span id="L333" rel="#L333">333</span>
<span id="L334" rel="#L334">334</span>
<span id="L335" rel="#L335">335</span>
<span id="L336" rel="#L336">336</span>
<span id="L337" rel="#L337">337</span>
<span id="L338" rel="#L338">338</span>
<span id="L339" rel="#L339">339</span>
<span id="L340" rel="#L340">340</span>
<span id="L341" rel="#L341">341</span>
<span id="L342" rel="#L342">342</span>
<span id="L343" rel="#L343">343</span>
<span id="L344" rel="#L344">344</span>
<span id="L345" rel="#L345">345</span>
<span id="L346" rel="#L346">346</span>
<span id="L347" rel="#L347">347</span>
<span id="L348" rel="#L348">348</span>
<span id="L349" rel="#L349">349</span>
<span id="L350" rel="#L350">350</span>
<span id="L351" rel="#L351">351</span>
<span id="L352" rel="#L352">352</span>
<span id="L353" rel="#L353">353</span>
<span id="L354" rel="#L354">354</span>
<span id="L355" rel="#L355">355</span>
<span id="L356" rel="#L356">356</span>
<span id="L357" rel="#L357">357</span>
<span id="L358" rel="#L358">358</span>
<span id="L359" rel="#L359">359</span>
<span id="L360" rel="#L360">360</span>
<span id="L361" rel="#L361">361</span>
<span id="L362" rel="#L362">362</span>
<span id="L363" rel="#L363">363</span>
<span id="L364" rel="#L364">364</span>
<span id="L365" rel="#L365">365</span>
<span id="L366" rel="#L366">366</span>
<span id="L367" rel="#L367">367</span>
<span id="L368" rel="#L368">368</span>
<span id="L369" rel="#L369">369</span>
<span id="L370" rel="#L370">370</span>
<span id="L371" rel="#L371">371</span>
<span id="L372" rel="#L372">372</span>
<span id="L373" rel="#L373">373</span>
<span id="L374" rel="#L374">374</span>
<span id="L375" rel="#L375">375</span>
<span id="L376" rel="#L376">376</span>
<span id="L377" rel="#L377">377</span>
<span id="L378" rel="#L378">378</span>
<span id="L379" rel="#L379">379</span>
<span id="L380" rel="#L380">380</span>
<span id="L381" rel="#L381">381</span>
<span id="L382" rel="#L382">382</span>
<span id="L383" rel="#L383">383</span>
<span id="L384" rel="#L384">384</span>
<span id="L385" rel="#L385">385</span>
<span id="L386" rel="#L386">386</span>
<span id="L387" rel="#L387">387</span>
<span id="L388" rel="#L388">388</span>
<span id="L389" rel="#L389">389</span>
<span id="L390" rel="#L390">390</span>
<span id="L391" rel="#L391">391</span>
<span id="L392" rel="#L392">392</span>
<span id="L393" rel="#L393">393</span>
<span id="L394" rel="#L394">394</span>
<span id="L395" rel="#L395">395</span>
<span id="L396" rel="#L396">396</span>
<span id="L397" rel="#L397">397</span>
<span id="L398" rel="#L398">398</span>
<span id="L399" rel="#L399">399</span>
<span id="L400" rel="#L400">400</span>
<span id="L401" rel="#L401">401</span>
<span id="L402" rel="#L402">402</span>
<span id="L403" rel="#L403">403</span>
<span id="L404" rel="#L404">404</span>
<span id="L405" rel="#L405">405</span>
<span id="L406" rel="#L406">406</span>
<span id="L407" rel="#L407">407</span>
<span id="L408" rel="#L408">408</span>
<span id="L409" rel="#L409">409</span>
<span id="L410" rel="#L410">410</span>
<span id="L411" rel="#L411">411</span>
<span id="L412" rel="#L412">412</span>
<span id="L413" rel="#L413">413</span>
<span id="L414" rel="#L414">414</span>
<span id="L415" rel="#L415">415</span>
<span id="L416" rel="#L416">416</span>
<span id="L417" rel="#L417">417</span>
<span id="L418" rel="#L418">418</span>
<span id="L419" rel="#L419">419</span>
<span id="L420" rel="#L420">420</span>
<span id="L421" rel="#L421">421</span>
<span id="L422" rel="#L422">422</span>
<span id="L423" rel="#L423">423</span>
<span id="L424" rel="#L424">424</span>
<span id="L425" rel="#L425">425</span>
<span id="L426" rel="#L426">426</span>
<span id="L427" rel="#L427">427</span>
<span id="L428" rel="#L428">428</span>
<span id="L429" rel="#L429">429</span>
<span id="L430" rel="#L430">430</span>
<span id="L431" rel="#L431">431</span>
<span id="L432" rel="#L432">432</span>
<span id="L433" rel="#L433">433</span>
<span id="L434" rel="#L434">434</span>
<span id="L435" rel="#L435">435</span>
<span id="L436" rel="#L436">436</span>
<span id="L437" rel="#L437">437</span>
<span id="L438" rel="#L438">438</span>
<span id="L439" rel="#L439">439</span>
<span id="L440" rel="#L440">440</span>
<span id="L441" rel="#L441">441</span>
<span id="L442" rel="#L442">442</span>
<span id="L443" rel="#L443">443</span>
<span id="L444" rel="#L444">444</span>
<span id="L445" rel="#L445">445</span>
<span id="L446" rel="#L446">446</span>
<span id="L447" rel="#L447">447</span>
<span id="L448" rel="#L448">448</span>
<span id="L449" rel="#L449">449</span>
<span id="L450" rel="#L450">450</span>
<span id="L451" rel="#L451">451</span>
<span id="L452" rel="#L452">452</span>
<span id="L453" rel="#L453">453</span>
<span id="L454" rel="#L454">454</span>
<span id="L455" rel="#L455">455</span>
<span id="L456" rel="#L456">456</span>
<span id="L457" rel="#L457">457</span>
<span id="L458" rel="#L458">458</span>
<span id="L459" rel="#L459">459</span>
<span id="L460" rel="#L460">460</span>
<span id="L461" rel="#L461">461</span>
<span id="L462" rel="#L462">462</span>
<span id="L463" rel="#L463">463</span>
<span id="L464" rel="#L464">464</span>
<span id="L465" rel="#L465">465</span>
<span id="L466" rel="#L466">466</span>
<span id="L467" rel="#L467">467</span>
<span id="L468" rel="#L468">468</span>
<span id="L469" rel="#L469">469</span>
<span id="L470" rel="#L470">470</span>
<span id="L471" rel="#L471">471</span>
<span id="L472" rel="#L472">472</span>
<span id="L473" rel="#L473">473</span>
<span id="L474" rel="#L474">474</span>
<span id="L475" rel="#L475">475</span>
<span id="L476" rel="#L476">476</span>
<span id="L477" rel="#L477">477</span>
<span id="L478" rel="#L478">478</span>
<span id="L479" rel="#L479">479</span>
<span id="L480" rel="#L480">480</span>
<span id="L481" rel="#L481">481</span>
<span id="L482" rel="#L482">482</span>
<span id="L483" rel="#L483">483</span>
<span id="L484" rel="#L484">484</span>
<span id="L485" rel="#L485">485</span>
<span id="L486" rel="#L486">486</span>
<span id="L487" rel="#L487">487</span>
<span id="L488" rel="#L488">488</span>
<span id="L489" rel="#L489">489</span>
<span id="L490" rel="#L490">490</span>
<span id="L491" rel="#L491">491</span>
<span id="L492" rel="#L492">492</span>
<span id="L493" rel="#L493">493</span>
<span id="L494" rel="#L494">494</span>
<span id="L495" rel="#L495">495</span>
<span id="L496" rel="#L496">496</span>
<span id="L497" rel="#L497">497</span>
<span id="L498" rel="#L498">498</span>
<span id="L499" rel="#L499">499</span>
<span id="L500" rel="#L500">500</span>
<span id="L501" rel="#L501">501</span>
<span id="L502" rel="#L502">502</span>
<span id="L503" rel="#L503">503</span>
<span id="L504" rel="#L504">504</span>
<span id="L505" rel="#L505">505</span>
<span id="L506" rel="#L506">506</span>
<span id="L507" rel="#L507">507</span>
<span id="L508" rel="#L508">508</span>
<span id="L509" rel="#L509">509</span>
<span id="L510" rel="#L510">510</span>
<span id="L511" rel="#L511">511</span>
<span id="L512" rel="#L512">512</span>
<span id="L513" rel="#L513">513</span>
<span id="L514" rel="#L514">514</span>
<span id="L515" rel="#L515">515</span>
<span id="L516" rel="#L516">516</span>
<span id="L517" rel="#L517">517</span>
<span id="L518" rel="#L518">518</span>
<span id="L519" rel="#L519">519</span>
<span id="L520" rel="#L520">520</span>
<span id="L521" rel="#L521">521</span>
<span id="L522" rel="#L522">522</span>
<span id="L523" rel="#L523">523</span>
<span id="L524" rel="#L524">524</span>

            </td>
            <td class="blob-line-code"><div class="code-body highlight"><pre><div class='line' id='LC1'><span class="o">&lt;?</span><span class="nx">php</span></div><div class='line' id='LC2'><br/></div><div class='line' id='LC3'><span class="sd">/**</span></div><div class='line' id='LC4'><span class="sd"> * weDevs Settings API wrapper class</span></div><div class='line' id='LC5'><span class="sd"> *</span></div><div class='line' id='LC6'><span class="sd"> * @author Tareq Hasan &lt;tareq@weDevs.com&gt;</span></div><div class='line' id='LC7'><span class="sd"> * @link http://tareq.weDevs.com Tareq&#39;s Planet</span></div><div class='line' id='LC8'><span class="sd"> * @example settings-api.php How to use the class</span></div><div class='line' id='LC9'><span class="sd"> */</span></div><div class='line' id='LC10'><span class="k">if</span> <span class="p">(</span> <span class="o">!</span><span class="nb">class_exists</span><span class="p">(</span> <span class="s1">&#39;WeDevs_Settings_API&#39;</span> <span class="p">)</span> <span class="p">)</span><span class="o">:</span></div><div class='line' id='LC11'><span class="k">class</span> <span class="nc">WeDevs_Settings_API</span> <span class="p">{</span></div><div class='line' id='LC12'><br/></div><div class='line' id='LC13'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC14'><span class="sd">     * settings sections array</span></div><div class='line' id='LC15'><span class="sd">     *</span></div><div class='line' id='LC16'><span class="sd">     * @var array</span></div><div class='line' id='LC17'><span class="sd">     */</span></div><div class='line' id='LC18'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">private</span> <span class="nv">$settings_sections</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC19'><br/></div><div class='line' id='LC20'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC21'><span class="sd">     * Settings fields array</span></div><div class='line' id='LC22'><span class="sd">     *</span></div><div class='line' id='LC23'><span class="sd">     * @var array</span></div><div class='line' id='LC24'><span class="sd">     */</span></div><div class='line' id='LC25'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">private</span> <span class="nv">$settings_fields</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC26'><br/></div><div class='line' id='LC27'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC28'><span class="sd">     * Singleton instance</span></div><div class='line' id='LC29'><span class="sd">     *</span></div><div class='line' id='LC30'><span class="sd">     * @var object</span></div><div class='line' id='LC31'><span class="sd">     */</span></div><div class='line' id='LC32'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">private</span> <span class="k">static</span> <span class="nv">$_instance</span><span class="p">;</span></div><div class='line' id='LC33'><br/></div><div class='line' id='LC34'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">public</span> <span class="k">function</span> <span class="nf">__construct</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC35'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">add_action</span><span class="p">(</span> <span class="s1">&#39;admin_enqueue_scripts&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span> <span class="nv">$this</span><span class="p">,</span> <span class="s1">&#39;admin_enqueue_scripts&#39;</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC36'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC37'><br/></div><div class='line' id='LC38'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC39'><span class="sd">     * Enqueue scripts and styles</span></div><div class='line' id='LC40'><span class="sd">     */</span></div><div class='line' id='LC41'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">admin_enqueue_scripts</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC42'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_style</span><span class="p">(</span> <span class="s1">&#39;wp-color-picker&#39;</span> <span class="p">);</span></div><div class='line' id='LC43'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_style</span><span class="p">(</span> <span class="s1">&#39;thickbox&#39;</span> <span class="p">);</span></div><div class='line' id='LC44'><br/></div><div class='line' id='LC45'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_script</span><span class="p">(</span> <span class="s1">&#39;wp-color-picker&#39;</span> <span class="p">);</span></div><div class='line' id='LC46'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_script</span><span class="p">(</span> <span class="s1">&#39;jquery&#39;</span> <span class="p">);</span></div><div class='line' id='LC47'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_script</span><span class="p">(</span> <span class="s1">&#39;media-upload&#39;</span> <span class="p">);</span></div><div class='line' id='LC48'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_enqueue_script</span><span class="p">(</span> <span class="s1">&#39;thickbox&#39;</span> <span class="p">);</span></div><div class='line' id='LC49'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC50'><br/></div><div class='line' id='LC51'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC52'><span class="sd">     * Set settings sections</span></div><div class='line' id='LC53'><span class="sd">     *</span></div><div class='line' id='LC54'><span class="sd">     * @param array   $sections setting sections array</span></div><div class='line' id='LC55'><span class="sd">     */</span></div><div class='line' id='LC56'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">set_sections</span><span class="p">(</span> <span class="nv">$sections</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC57'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span> <span class="o">=</span> <span class="nv">$sections</span><span class="p">;</span></div><div class='line' id='LC58'><br/></div><div class='line' id='LC59'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$this</span><span class="p">;</span></div><div class='line' id='LC60'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC61'><br/></div><div class='line' id='LC62'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC63'><span class="sd">     * Add a single section</span></div><div class='line' id='LC64'><span class="sd">     *</span></div><div class='line' id='LC65'><span class="sd">     * @param array   $section</span></div><div class='line' id='LC66'><span class="sd">     */</span></div><div class='line' id='LC67'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">add_section</span><span class="p">(</span> <span class="nv">$section</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC68'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span><span class="p">[]</span> <span class="o">=</span> <span class="nv">$section</span><span class="p">;</span></div><div class='line' id='LC69'><br/></div><div class='line' id='LC70'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$this</span><span class="p">;</span></div><div class='line' id='LC71'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC72'><br/></div><div class='line' id='LC73'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC74'><span class="sd">     * Set settings fields</span></div><div class='line' id='LC75'><span class="sd">     *</span></div><div class='line' id='LC76'><span class="sd">     * @param array   $fields settings fields array</span></div><div class='line' id='LC77'><span class="sd">     */</span></div><div class='line' id='LC78'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">set_fields</span><span class="p">(</span> <span class="nv">$fields</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC79'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_fields</span> <span class="o">=</span> <span class="nv">$fields</span><span class="p">;</span></div><div class='line' id='LC80'><br/></div><div class='line' id='LC81'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$this</span><span class="p">;</span></div><div class='line' id='LC82'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC83'><br/></div><div class='line' id='LC84'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">add_field</span><span class="p">(</span> <span class="nv">$section</span><span class="p">,</span> <span class="nv">$field</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC85'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$defaults</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC86'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;name&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC87'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC88'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;desc&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC89'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;text&#39;</span></div><div class='line' id='LC90'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC91'><br/></div><div class='line' id='LC92'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$arg</span> <span class="o">=</span> <span class="nx">wp_parse_args</span><span class="p">(</span> <span class="nv">$field</span><span class="p">,</span> <span class="nv">$defaults</span> <span class="p">);</span></div><div class='line' id='LC93'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_fields</span><span class="p">[</span><span class="nv">$section</span><span class="p">][]</span> <span class="o">=</span> <span class="nv">$arg</span><span class="p">;</span></div><div class='line' id='LC94'><br/></div><div class='line' id='LC95'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$this</span><span class="p">;</span></div><div class='line' id='LC96'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC97'><br/></div><div class='line' id='LC98'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC99'><span class="sd">     * Initialize and registers the settings sections and fileds to WordPress</span></div><div class='line' id='LC100'><span class="sd">     *</span></div><div class='line' id='LC101'><span class="sd">     * Usually this should be called at `admin_init` hook.</span></div><div class='line' id='LC102'><span class="sd">     *</span></div><div class='line' id='LC103'><span class="sd">     * This function gets the initiated settings sections and fields. Then</span></div><div class='line' id='LC104'><span class="sd">     * registers them to WordPress and ready for use.</span></div><div class='line' id='LC105'><span class="sd">     */</span></div><div class='line' id='LC106'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">admin_init</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC107'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//register settings sections</span></div><div class='line' id='LC108'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span> <span class="k">as</span> <span class="nv">$section</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC109'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="k">false</span> <span class="o">==</span> <span class="nx">get_option</span><span class="p">(</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC110'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">add_option</span><span class="p">(</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC111'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC112'><br/></div><div class='line' id='LC113'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="nb">isset</span><span class="p">(</span><span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">])</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">])</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC114'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="o">=</span> <span class="s1">&#39;&lt;div class=&quot;inside&quot;&gt;&#39;</span><span class="o">.</span><span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&lt;/div&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC115'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$callback</span> <span class="o">=</span> <span class="nb">create_function</span><span class="p">(</span><span class="s1">&#39;&#39;</span><span class="p">,</span> <span class="s1">&#39;echo &quot;&#39;</span><span class="o">.</span><span class="nb">str_replace</span><span class="p">(</span><span class="s1">&#39;&quot;&#39;</span><span class="p">,</span> <span class="s1">&#39;\&quot;&#39;</span><span class="p">,</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">])</span><span class="o">.</span><span class="s1">&#39;&quot;;&#39;</span><span class="p">);</span></div><div class='line' id='LC116'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC117'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$callback</span> <span class="o">=</span> <span class="s1">&#39;__return_false&#39;</span><span class="p">;</span></div><div class='line' id='LC118'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC119'><br/></div><div class='line' id='LC120'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">add_settings_section</span><span class="p">(</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;title&#39;</span><span class="p">],</span> <span class="nv">$callback</span><span class="p">,</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC121'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC122'><br/></div><div class='line' id='LC123'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//register settings fields</span></div><div class='line' id='LC124'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_fields</span> <span class="k">as</span> <span class="nv">$section</span> <span class="o">=&gt;</span> <span class="nv">$field</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC125'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$field</span> <span class="k">as</span> <span class="nv">$option</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC126'><br/></div><div class='line' id='LC127'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$type</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;type&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;type&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;text&#39;</span><span class="p">;</span></div><div class='line' id='LC128'><br/></div><div class='line' id='LC129'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$args</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC130'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;id&#39;</span> <span class="o">=&gt;</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;name&#39;</span><span class="p">],</span></div><div class='line' id='LC131'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;desc&#39;</span> <span class="o">=&gt;</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC132'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;name&#39;</span> <span class="o">=&gt;</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;label&#39;</span><span class="p">],</span></div><div class='line' id='LC133'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;section&#39;</span> <span class="o">=&gt;</span> <span class="nv">$section</span><span class="p">,</span></div><div class='line' id='LC134'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;size&#39;</span> <span class="o">=&gt;</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="k">null</span><span class="p">,</span></div><div class='line' id='LC135'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;options&#39;</span> <span class="o">=&gt;</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;options&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;options&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC136'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;std&#39;</span> <span class="o">=&gt;</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;default&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;default&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC137'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;sanitize_callback&#39;</span> <span class="o">=&gt;</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;sanitize_callback&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;sanitize_callback&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;&#39;</span><span class="p">,</span></div><div class='line' id='LC138'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC139'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">add_settings_field</span><span class="p">(</span> <span class="nv">$section</span> <span class="o">.</span> <span class="s1">&#39;[&#39;</span> <span class="o">.</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;name&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="s1">&#39;]&#39;</span><span class="p">,</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;label&#39;</span><span class="p">],</span> <span class="k">array</span><span class="p">(</span> <span class="nv">$this</span><span class="p">,</span> <span class="s1">&#39;callback_&#39;</span> <span class="o">.</span> <span class="nv">$type</span> <span class="p">),</span> <span class="nv">$section</span><span class="p">,</span> <span class="nv">$section</span><span class="p">,</span> <span class="nv">$args</span> <span class="p">);</span></div><div class='line' id='LC140'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC141'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC142'><br/></div><div class='line' id='LC143'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// creates our settings in the options table</span></div><div class='line' id='LC144'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span> <span class="k">as</span> <span class="nv">$section</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC145'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">register_setting</span><span class="p">(</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$section</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="k">array</span><span class="p">(</span> <span class="nv">$this</span><span class="p">,</span> <span class="s1">&#39;sanitize_options&#39;</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC146'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC147'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC148'><br/></div><div class='line' id='LC149'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC150'><span class="sd">     * Displays a text field for a settings field</span></div><div class='line' id='LC151'><span class="sd">     *</span></div><div class='line' id='LC152'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC153'><span class="sd">     */</span></div><div class='line' id='LC154'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_text</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC155'><br/></div><div class='line' id='LC156'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC157'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC158'><br/></div><div class='line' id='LC159'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;text&quot; class=&quot;%1$s-text&quot; id=&quot;%2$s[%3$s]&quot; name=&quot;%2$s[%3$s]&quot; value=&quot;%4$s&quot;/&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span> <span class="p">);</span></div><div class='line' id='LC160'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC161'><br/></div><div class='line' id='LC162'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC163'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC164'><br/></div><div class='line' id='LC165'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC166'><span class="sd">     * Displays a checkbox for a settings field</span></div><div class='line' id='LC167'><span class="sd">     *</span></div><div class='line' id='LC168'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC169'><span class="sd">     */</span></div><div class='line' id='LC170'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_checkbox</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC171'><br/></div><div class='line' id='LC172'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC173'><br/></div><div class='line' id='LC174'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;hidden&quot; name=&quot;%1$s[%2$s]&quot; value=&quot;off&quot; /&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC175'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;checkbox&quot; class=&quot;checkbox&quot; id=&quot;%1$s[%2$s]&quot; name=&quot;%1$s[%2$s]&quot; value=&quot;on&quot;%4$s /&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span><span class="p">,</span> <span class="nx">checked</span><span class="p">(</span> <span class="nv">$value</span><span class="p">,</span> <span class="s1">&#39;on&#39;</span><span class="p">,</span> <span class="k">false</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC176'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;label for=&quot;%1$s[%2$s]&quot;&gt; %3$s&lt;/label&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC177'><br/></div><div class='line' id='LC178'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC179'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC180'><br/></div><div class='line' id='LC181'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC182'><span class="sd">     * Displays a multicheckbox a settings field</span></div><div class='line' id='LC183'><span class="sd">     *</span></div><div class='line' id='LC184'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC185'><span class="sd">     */</span></div><div class='line' id='LC186'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_multicheck</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC187'><br/></div><div class='line' id='LC188'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC189'><br/></div><div class='line' id='LC190'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC191'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;options&#39;</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$label</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC192'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$checked</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$value</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$value</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;0&#39;</span><span class="p">;</span></div><div class='line' id='LC193'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;checkbox&quot; class=&quot;checkbox&quot; id=&quot;%1$s[%2$s][%3$s]&quot; name=&quot;%1$s[%2$s][%3$s]&quot; value=&quot;%3$s&quot;%4$s /&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$key</span><span class="p">,</span> <span class="nx">checked</span><span class="p">(</span> <span class="nv">$checked</span><span class="p">,</span> <span class="nv">$key</span><span class="p">,</span> <span class="k">false</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC194'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;label for=&quot;%1$s[%2$s][%4$s]&quot;&gt; %3$s&lt;/label&gt;&lt;br&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$label</span><span class="p">,</span> <span class="nv">$key</span> <span class="p">);</span></div><div class='line' id='LC195'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC196'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/label&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC197'><br/></div><div class='line' id='LC198'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC199'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC200'><br/></div><div class='line' id='LC201'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC202'><span class="sd">     * Displays a multicheckbox a settings field</span></div><div class='line' id='LC203'><span class="sd">     *</span></div><div class='line' id='LC204'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC205'><span class="sd">     */</span></div><div class='line' id='LC206'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_radio</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC207'><br/></div><div class='line' id='LC208'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC209'><br/></div><div class='line' id='LC210'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC211'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;options&#39;</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$label</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC212'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;radio&quot; class=&quot;radio&quot; id=&quot;%1$s[%2$s][%3$s]&quot; name=&quot;%1$s[%2$s]&quot; value=&quot;%3$s&quot;%4$s /&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$key</span><span class="p">,</span> <span class="nx">checked</span><span class="p">(</span> <span class="nv">$value</span><span class="p">,</span> <span class="nv">$key</span><span class="p">,</span> <span class="k">false</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC213'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;label for=&quot;%1$s[%2$s][%4$s]&quot;&gt; %3$s&lt;/label&gt;&lt;br&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$label</span><span class="p">,</span> <span class="nv">$key</span> <span class="p">);</span></div><div class='line' id='LC214'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC215'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/label&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC216'><br/></div><div class='line' id='LC217'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC218'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC219'><br/></div><div class='line' id='LC220'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC221'><span class="sd">     * Displays a selectbox for a settings field</span></div><div class='line' id='LC222'><span class="sd">     *</span></div><div class='line' id='LC223'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC224'><span class="sd">     */</span></div><div class='line' id='LC225'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_select</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC226'><br/></div><div class='line' id='LC227'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC228'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC229'><br/></div><div class='line' id='LC230'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;select class=&quot;%1$s&quot; name=&quot;%2$s[%3$s]&quot; id=&quot;%2$s[%3$s]&quot;&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC231'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;options&#39;</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$label</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC232'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;option value=&quot;%s&quot;%s&gt;%s&lt;/option&gt;&#39;</span><span class="p">,</span> <span class="nv">$key</span><span class="p">,</span> <span class="nx">selected</span><span class="p">(</span> <span class="nv">$value</span><span class="p">,</span> <span class="nv">$key</span><span class="p">,</span> <span class="k">false</span> <span class="p">),</span> <span class="nv">$label</span> <span class="p">);</span></div><div class='line' id='LC233'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC234'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;/select&gt;&#39;</span> <span class="p">);</span></div><div class='line' id='LC235'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC236'><br/></div><div class='line' id='LC237'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC238'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC239'><br/></div><div class='line' id='LC240'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC241'><span class="sd">     * Displays a textarea for a settings field</span></div><div class='line' id='LC242'><span class="sd">     *</span></div><div class='line' id='LC243'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC244'><span class="sd">     */</span></div><div class='line' id='LC245'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_textarea</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC246'><br/></div><div class='line' id='LC247'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_textarea</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC248'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC249'><br/></div><div class='line' id='LC250'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;textarea rows=&quot;5&quot; cols=&quot;55&quot; class=&quot;%1$s-text&quot; id=&quot;%2$s[%3$s]&quot; name=&quot;%2$s[%3$s]&quot;&gt;%4$s&lt;/textarea&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span> <span class="p">);</span></div><div class='line' id='LC251'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;br&gt;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC252'><br/></div><div class='line' id='LC253'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC254'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC255'><br/></div><div class='line' id='LC256'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC257'><span class="sd">     * Displays a textarea for a settings field</span></div><div class='line' id='LC258'><span class="sd">     *</span></div><div class='line' id='LC259'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC260'><span class="sd">     */</span></div><div class='line' id='LC261'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_html</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC262'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">];</span></div><div class='line' id='LC263'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC264'><br/></div><div class='line' id='LC265'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC266'><span class="sd">     * Displays a rich text textarea for a settings field</span></div><div class='line' id='LC267'><span class="sd">     *</span></div><div class='line' id='LC268'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC269'><span class="sd">     */</span></div><div class='line' id='LC270'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_wysiwyg</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC271'><br/></div><div class='line' id='LC272'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">wpautop</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC273'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;500px&#39;</span><span class="p">;</span></div><div class='line' id='LC274'><br/></div><div class='line' id='LC275'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;div style=&quot;width: &#39;</span> <span class="o">.</span> <span class="nv">$size</span> <span class="o">.</span> <span class="s1">&#39;;&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC276'><br/></div><div class='line' id='LC277'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">wp_editor</span><span class="p">(</span> <span class="nv">$value</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="s1">&#39;[&#39;</span> <span class="o">.</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="s1">&#39;]&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span> <span class="s1">&#39;teeny&#39;</span> <span class="o">=&gt;</span> <span class="k">true</span><span class="p">,</span> <span class="s1">&#39;textarea_rows&#39;</span> <span class="o">=&gt;</span> <span class="mi">10</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC278'><br/></div><div class='line' id='LC279'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;/div&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC280'><br/></div><div class='line' id='LC281'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;br&gt;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC282'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC283'><br/></div><div class='line' id='LC284'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC285'><span class="sd">     * Displays a file upload field for a settings field</span></div><div class='line' id='LC286'><span class="sd">     *</span></div><div class='line' id='LC287'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC288'><span class="sd">     */</span></div><div class='line' id='LC289'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_file</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC290'><br/></div><div class='line' id='LC291'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC292'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC293'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$id</span> <span class="o">=</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">]</span>  <span class="o">.</span> <span class="s1">&#39;[&#39;</span> <span class="o">.</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="s1">&#39;]&#39;</span><span class="p">;</span></div><div class='line' id='LC294'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$js_id</span> <span class="o">=</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">]</span>  <span class="o">.</span> <span class="s1">&#39;\\\\[&#39;</span> <span class="o">.</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="s1">&#39;\\\\]&#39;</span><span class="p">;</span></div><div class='line' id='LC295'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;text&quot; class=&quot;%1$s-text&quot; id=&quot;%2$s[%3$s]&quot; name=&quot;%2$s[%3$s]&quot; value=&quot;%4$s&quot;/&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span> <span class="p">);</span></div><div class='line' id='LC296'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="s1">&#39;&lt;input type=&quot;button&quot; class=&quot;button wpsf-browse&quot; id=&quot;&#39;</span><span class="o">.</span> <span class="nv">$id</span> <span class="o">.</span><span class="s1">&#39;_button&quot; value=&quot;Browse&quot; /&gt;</span></div><div class='line' id='LC297'><span class="s1">        &lt;script type=&quot;text/javascript&quot;&gt;</span></div><div class='line' id='LC298'><span class="s1">        jQuery(document).ready(function($){</span></div><div class='line' id='LC299'><span class="s1">            $(&quot;#&#39;</span><span class="o">.</span> <span class="nv">$js_id</span> <span class="o">.</span><span class="s1">&#39;_button&quot;).click(function() {</span></div><div class='line' id='LC300'><span class="s1">                tb_show(&quot;&quot;, &quot;media-upload.php?post_id=0&amp;amp;type=image&amp;amp;TB_iframe=true&quot;);</span></div><div class='line' id='LC301'><span class="s1">                window.original_send_to_editor = window.send_to_editor;</span></div><div class='line' id='LC302'><span class="s1">                window.send_to_editor = function(html) {</span></div><div class='line' id='LC303'><span class="s1">                    var url = $(html).attr(\&#39;href\&#39;);</span></div><div class='line' id='LC304'><span class="s1">                    if ( !url ) {</span></div><div class='line' id='LC305'><span class="s1">                        url = $(html).attr(\&#39;src\&#39;);</span></div><div class='line' id='LC306'><span class="s1">                    };</span></div><div class='line' id='LC307'><span class="s1">                    $(&quot;#&#39;</span><span class="o">.</span> <span class="nv">$js_id</span> <span class="o">.</span><span class="s1">&#39;&quot;).val(url);</span></div><div class='line' id='LC308'><span class="s1">                    tb_remove();</span></div><div class='line' id='LC309'><span class="s1">                    window.send_to_editor = window.original_send_to_editor;</span></div><div class='line' id='LC310'><span class="s1">                };</span></div><div class='line' id='LC311'><span class="s1">                return false;</span></div><div class='line' id='LC312'><span class="s1">            });</span></div><div class='line' id='LC313'><span class="s1">        });</span></div><div class='line' id='LC314'><span class="s1">        &lt;/script&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC315'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC316'><br/></div><div class='line' id='LC317'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC318'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC319'><br/></div><div class='line' id='LC320'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC321'><span class="sd">     * Displays a password field for a settings field</span></div><div class='line' id='LC322'><span class="sd">     *</span></div><div class='line' id='LC323'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC324'><span class="sd">     */</span></div><div class='line' id='LC325'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_password</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC326'><br/></div><div class='line' id='LC327'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC328'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC329'><br/></div><div class='line' id='LC330'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;password&quot; class=&quot;%1$s-text&quot; id=&quot;%2$s[%3$s]&quot; name=&quot;%2$s[%3$s]&quot; value=&quot;%4$s&quot;/&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span> <span class="p">);</span></div><div class='line' id='LC331'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC332'><br/></div><div class='line' id='LC333'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC334'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC335'><br/></div><div class='line' id='LC336'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC337'><span class="sd">     * Displays a color picker field for a settings field</span></div><div class='line' id='LC338'><span class="sd">     *</span></div><div class='line' id='LC339'><span class="sd">     * @param array   $args settings field args</span></div><div class='line' id='LC340'><span class="sd">     */</span></div><div class='line' id='LC341'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">callback_color</span><span class="p">(</span> <span class="nv">$args</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC342'><br/></div><div class='line' id='LC343'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$value</span> <span class="o">=</span> <span class="nx">esc_attr</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_option</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="p">);</span></div><div class='line' id='LC344'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$size</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="s1">&#39;regular&#39;</span><span class="p">;</span></div><div class='line' id='LC345'><br/></div><div class='line' id='LC346'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;input type=&quot;text&quot; class=&quot;%1$s-text wp-color-picker-field&quot; id=&quot;%2$s[%3$s]&quot; name=&quot;%2$s[%3$s]&quot; value=&quot;%4$s&quot; data-default-color=&quot;%5$s&quot; /&gt;&#39;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;section&#39;</span><span class="p">],</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$value</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;std&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC347'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;span class=&quot;description&quot; style=&quot;display:block;&quot;&gt; %s&lt;/span&gt;&#39;</span><span class="p">,</span> <span class="nv">$args</span><span class="p">[</span><span class="s1">&#39;desc&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC348'><br/></div><div class='line' id='LC349'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC350'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC351'><br/></div><div class='line' id='LC352'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC353'><span class="sd">     * Sanitize callback for Settings API</span></div><div class='line' id='LC354'><span class="sd">     */</span></div><div class='line' id='LC355'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">sanitize_options</span><span class="p">(</span> <span class="nv">$options</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC356'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span> <span class="nv">$options</span> <span class="k">as</span> <span class="nv">$option_slug</span> <span class="o">=&gt;</span> <span class="nv">$option_value</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC357'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$sanitize_callback</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">get_sanitize_callback</span><span class="p">(</span> <span class="nv">$option_slug</span> <span class="p">);</span></div><div class='line' id='LC358'><br/></div><div class='line' id='LC359'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// If callback is set, call it</span></div><div class='line' id='LC360'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="nv">$sanitize_callback</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC361'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$options</span><span class="p">[</span> <span class="nv">$option_slug</span> <span class="p">]</span> <span class="o">=</span> <span class="nb">call_user_func</span><span class="p">(</span> <span class="nv">$sanitize_callback</span><span class="p">,</span> <span class="nv">$option_value</span> <span class="p">);</span></div><div class='line' id='LC362'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">continue</span><span class="p">;</span></div><div class='line' id='LC363'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC364'><br/></div><div class='line' id='LC365'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Treat everything that&#39;s not an array as a string</span></div><div class='line' id='LC366'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="o">!</span><span class="nb">is_array</span><span class="p">(</span> <span class="nv">$option_value</span> <span class="p">)</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC367'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$options</span><span class="p">[</span> <span class="nv">$option_slug</span> <span class="p">]</span> <span class="o">=</span> <span class="nx">sanitize_text_field</span><span class="p">(</span> <span class="nv">$option_value</span> <span class="p">);</span></div><div class='line' id='LC368'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">continue</span><span class="p">;</span></div><div class='line' id='LC369'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC370'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC371'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$options</span><span class="p">;</span></div><div class='line' id='LC372'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC373'><br/></div><div class='line' id='LC374'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC375'><span class="sd">     * Get sanitization callback for given option slug</span></div><div class='line' id='LC376'><span class="sd">     *</span></div><div class='line' id='LC377'><span class="sd">     * @param string $slug option slug</span></div><div class='line' id='LC378'><span class="sd">     *</span></div><div class='line' id='LC379'><span class="sd">     * @return mixed string or bool false</span></div><div class='line' id='LC380'><span class="sd">     */</span></div><div class='line' id='LC381'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">get_sanitize_callback</span><span class="p">(</span> <span class="nv">$slug</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC382'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="k">empty</span><span class="p">(</span> <span class="nv">$slug</span> <span class="p">)</span> <span class="p">)</span></div><div class='line' id='LC383'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC384'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Iterate over registered fields and see if we can find proper callback</span></div><div class='line' id='LC385'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_fields</span> <span class="k">as</span> <span class="nv">$section</span> <span class="o">=&gt;</span> <span class="nv">$options</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC386'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$options</span> <span class="k">as</span> <span class="nv">$option</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC387'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;name&#39;</span><span class="p">]</span> <span class="o">!=</span> <span class="nv">$slug</span> <span class="p">)</span></div><div class='line' id='LC388'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">continue</span><span class="p">;</span></div><div class='line' id='LC389'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Return the callback name</span></div><div class='line' id='LC390'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;sanitize_callback&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">is_callable</span><span class="p">(</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;sanitize_callback&#39;</span><span class="p">]</span> <span class="p">)</span> <span class="o">?</span> <span class="nv">$option</span><span class="p">[</span><span class="s1">&#39;sanitize_callback&#39;</span><span class="p">]</span> <span class="o">:</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC391'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC392'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC393'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC394'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC395'><br/></div><div class='line' id='LC396'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC397'><span class="sd">     * Get the value of a settings field</span></div><div class='line' id='LC398'><span class="sd">     *</span></div><div class='line' id='LC399'><span class="sd">     * @param string  $option  settings field name</span></div><div class='line' id='LC400'><span class="sd">     * @param string  $section the section name this field belongs to</span></div><div class='line' id='LC401'><span class="sd">     * @param string  $default default text if it&#39;s not found</span></div><div class='line' id='LC402'><span class="sd">     * @return string</span></div><div class='line' id='LC403'><span class="sd">     */</span></div><div class='line' id='LC404'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">get_option</span><span class="p">(</span> <span class="nv">$option</span><span class="p">,</span> <span class="nv">$section</span><span class="p">,</span> <span class="nv">$default</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC405'><br/></div><div class='line' id='LC406'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$options</span> <span class="o">=</span> <span class="nx">get_option</span><span class="p">(</span> <span class="nv">$section</span> <span class="p">);</span></div><div class='line' id='LC407'><br/></div><div class='line' id='LC408'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span> <span class="nb">isset</span><span class="p">(</span> <span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">]</span> <span class="p">)</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC409'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">];</span></div><div class='line' id='LC410'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC411'><br/></div><div class='line' id='LC412'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$default</span><span class="p">;</span></div><div class='line' id='LC413'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC414'><br/></div><div class='line' id='LC415'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC416'><span class="sd">     * Show navigations as tab</span></div><div class='line' id='LC417'><span class="sd">     *</span></div><div class='line' id='LC418'><span class="sd">     * Shows all the settings section labels as tab</span></div><div class='line' id='LC419'><span class="sd">     */</span></div><div class='line' id='LC420'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">show_navigation</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC421'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">=</span> <span class="s1">&#39;&lt;h2 class=&quot;nav-tab-wrapper&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC422'><br/></div><div class='line' id='LC423'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span> <span class="k">as</span> <span class="nv">$tab</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC424'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="nb">sprintf</span><span class="p">(</span> <span class="s1">&#39;&lt;a href=&quot;#%1$s&quot; class=&quot;nav-tab&quot; id=&quot;%1$s-tab&quot;&gt;%2$s&lt;/a&gt;&#39;</span><span class="p">,</span> <span class="nv">$tab</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$tab</span><span class="p">[</span><span class="s1">&#39;title&#39;</span><span class="p">]</span> <span class="p">);</span></div><div class='line' id='LC425'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC426'><br/></div><div class='line' id='LC427'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$html</span> <span class="o">.=</span> <span class="s1">&#39;&lt;/h2&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC428'><br/></div><div class='line' id='LC429'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$html</span><span class="p">;</span></div><div class='line' id='LC430'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC431'><br/></div><div class='line' id='LC432'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC433'><span class="sd">     * Show the section settings forms</span></div><div class='line' id='LC434'><span class="sd">     *</span></div><div class='line' id='LC435'><span class="sd">     * This function displays every sections in a different form</span></div><div class='line' id='LC436'><span class="sd">     */</span></div><div class='line' id='LC437'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">show_forms</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC438'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC439'><span class="x">        &lt;div class=&quot;metabox-holder&quot;&gt;</span></div><div class='line' id='LC440'><span class="x">            &lt;div class=&quot;postbox&quot;&gt;</span></div><div class='line' id='LC441'><span class="x">                </span><span class="cp">&lt;?php</span> <span class="k">foreach</span> <span class="p">(</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">settings_sections</span> <span class="k">as</span> <span class="nv">$form</span> <span class="p">)</span> <span class="p">{</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC442'><span class="x">                    &lt;div id=&quot;</span><span class="cp">&lt;?php</span> <span class="k">echo</span> <span class="nv">$form</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">];</span> <span class="cp">?&gt;</span><span class="x">&quot; class=&quot;group&quot;&gt;</span></div><div class='line' id='LC443'><span class="x">                        &lt;form method=&quot;post&quot; action=&quot;options.php&quot;&gt;</span></div><div class='line' id='LC444'><br/></div><div class='line' id='LC445'><span class="x">                            </span><span class="cp">&lt;?php</span> <span class="nx">do_action</span><span class="p">(</span> <span class="s1">&#39;wsa_form_top_&#39;</span> <span class="o">.</span> <span class="nv">$form</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$form</span> <span class="p">);</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC446'><span class="x">                            </span><span class="cp">&lt;?php</span> <span class="nx">settings_fields</span><span class="p">(</span> <span class="nv">$form</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC447'><span class="x">                            </span><span class="cp">&lt;?php</span> <span class="nx">do_settings_sections</span><span class="p">(</span> <span class="nv">$form</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">]</span> <span class="p">);</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC448'><span class="x">                            </span><span class="cp">&lt;?php</span> <span class="nx">do_action</span><span class="p">(</span> <span class="s1">&#39;wsa_form_bottom_&#39;</span> <span class="o">.</span> <span class="nv">$form</span><span class="p">[</span><span class="s1">&#39;id&#39;</span><span class="p">],</span> <span class="nv">$form</span> <span class="p">);</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC449'><br/></div><div class='line' id='LC450'><span class="x">                            &lt;div style=&quot;padding-left: 10px&quot;&gt;</span></div><div class='line' id='LC451'><span class="x">                                </span><span class="cp">&lt;?php</span> <span class="nx">submit_button</span><span class="p">();</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC452'><span class="x">                            &lt;/div&gt;</span></div><div class='line' id='LC453'><span class="x">                        &lt;/form&gt;</span></div><div class='line' id='LC454'><span class="x">                    &lt;/div&gt;</span></div><div class='line' id='LC455'><span class="x">                </span><span class="cp">&lt;?php</span> <span class="p">}</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC456'><span class="x">            &lt;/div&gt;</span></div><div class='line' id='LC457'><span class="x">        &lt;/div&gt;</span></div><div class='line' id='LC458'><span class="x">        </span><span class="cp">&lt;?php</span></div><div class='line' id='LC459'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">script</span><span class="p">();</span></div><div class='line' id='LC460'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC461'><br/></div><div class='line' id='LC462'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC463'><span class="sd">     * Tabbable JavaScript codes &amp; Initiate Color Picker</span></div><div class='line' id='LC464'><span class="sd">     *</span></div><div class='line' id='LC465'><span class="sd">     * This code uses localstorage for displaying active tabs</span></div><div class='line' id='LC466'><span class="sd">     */</span></div><div class='line' id='LC467'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">script</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC468'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC469'><span class="x">        &lt;script&gt;</span></div><div class='line' id='LC470'><span class="x">            jQuery(document).ready(function($) {</span></div><div class='line' id='LC471'><span class="x">                //Initiate Color Picker</span></div><div class='line' id='LC472'><span class="x">                $(&#39;.wp-color-picker-field&#39;).wpColorPicker();</span></div><div class='line' id='LC473'><span class="x">                // Switches option sections</span></div><div class='line' id='LC474'><span class="x">                $(&#39;.group&#39;).hide();</span></div><div class='line' id='LC475'><span class="x">                var activetab = &#39;&#39;;</span></div><div class='line' id='LC476'><span class="x">                if (typeof(localStorage) != &#39;undefined&#39; ) {</span></div><div class='line' id='LC477'><span class="x">                    activetab = localStorage.getItem(&quot;activetab&quot;);</span></div><div class='line' id='LC478'><span class="x">                }</span></div><div class='line' id='LC479'><span class="x">                if (activetab != &#39;&#39; &amp;&amp; $(activetab).length ) {</span></div><div class='line' id='LC480'><span class="x">                    $(activetab).fadeIn();</span></div><div class='line' id='LC481'><span class="x">                } else {</span></div><div class='line' id='LC482'><span class="x">                    $(&#39;.group:first&#39;).fadeIn();</span></div><div class='line' id='LC483'><span class="x">                }</span></div><div class='line' id='LC484'><span class="x">                $(&#39;.group .collapsed&#39;).each(function(){</span></div><div class='line' id='LC485'><span class="x">                    $(this).find(&#39;input:checked&#39;).parent().parent().parent().nextAll().each(</span></div><div class='line' id='LC486'><span class="x">                    function(){</span></div><div class='line' id='LC487'><span class="x">                        if ($(this).hasClass(&#39;last&#39;)) {</span></div><div class='line' id='LC488'><span class="x">                            $(this).removeClass(&#39;hidden&#39;);</span></div><div class='line' id='LC489'><span class="x">                            return false;</span></div><div class='line' id='LC490'><span class="x">                        }</span></div><div class='line' id='LC491'><span class="x">                        $(this).filter(&#39;.hidden&#39;).removeClass(&#39;hidden&#39;);</span></div><div class='line' id='LC492'><span class="x">                    });</span></div><div class='line' id='LC493'><span class="x">                });</span></div><div class='line' id='LC494'><br/></div><div class='line' id='LC495'><span class="x">                if (activetab != &#39;&#39; &amp;&amp; $(activetab + &#39;-tab&#39;).length ) {</span></div><div class='line' id='LC496'><span class="x">                    $(activetab + &#39;-tab&#39;).addClass(&#39;nav-tab-active&#39;);</span></div><div class='line' id='LC497'><span class="x">                }</span></div><div class='line' id='LC498'><span class="x">                else {</span></div><div class='line' id='LC499'><span class="x">                    $(&#39;.nav-tab-wrapper a:first&#39;).addClass(&#39;nav-tab-active&#39;);</span></div><div class='line' id='LC500'><span class="x">                }</span></div><div class='line' id='LC501'><span class="x">                $(&#39;.nav-tab-wrapper a&#39;).click(function(evt) {</span></div><div class='line' id='LC502'><span class="x">                    $(&#39;.nav-tab-wrapper a&#39;).removeClass(&#39;nav-tab-active&#39;);</span></div><div class='line' id='LC503'><span class="x">                    $(this).addClass(&#39;nav-tab-active&#39;).blur();</span></div><div class='line' id='LC504'><span class="x">                    var clicked_group = $(this).attr(&#39;href&#39;);</span></div><div class='line' id='LC505'><span class="x">                    if (typeof(localStorage) != &#39;undefined&#39; ) {</span></div><div class='line' id='LC506'><span class="x">                        localStorage.setItem(&quot;activetab&quot;, $(this).attr(&#39;href&#39;));</span></div><div class='line' id='LC507'><span class="x">                    }</span></div><div class='line' id='LC508'><span class="x">                    $(&#39;.group&#39;).hide();</span></div><div class='line' id='LC509'><span class="x">                    $(clicked_group).fadeIn();</span></div><div class='line' id='LC510'><span class="x">                    evt.preventDefault();</span></div><div class='line' id='LC511'><span class="x">                });</span></div><div class='line' id='LC512'><span class="x">            });</span></div><div class='line' id='LC513'><span class="x">        &lt;/script&gt;</span></div><div class='line' id='LC514'><br/></div><div class='line' id='LC515'><span class="x">        &lt;style type=&quot;text/css&quot;&gt;</span></div><div class='line' id='LC516'><span class="x">            /** WordPress 3.8 Fix **/</span></div><div class='line' id='LC517'><span class="x">            .form-table th { padding: 20px 10px; }</span></div><div class='line' id='LC518'><span class="x">            #wpbody-content .metabox-holder { padding-top: 5px; }</span></div><div class='line' id='LC519'><span class="x">        &lt;/style&gt;</span></div><div class='line' id='LC520'><span class="x">        </span><span class="cp">&lt;?php</span></div><div class='line' id='LC521'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC522'><br/></div><div class='line' id='LC523'><span class="p">}</span></div><div class='line' id='LC524'><span class="k">endif</span><span class="p">;</span></div></pre></div></td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2014 <span title="0.04873s from github-fe116-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="fullscreen-contents js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped tooltipped-w" aria-label="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped tooltipped-w"
      aria-label="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close js-ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

