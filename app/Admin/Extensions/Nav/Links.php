<?php

namespace App\Admin\Extensions\Nav;

class Links
{
    public function __toString()
    {
        return <<<HTML

<li>
    <a href="/admin/users">
      <i class="fa fa-graduation-cap"></i><span style="margin-left:3px">Students</span>
    </a>
</li>
<li>
    <a href="/admin/topics">
      <i class="fa fa-archive"></i><span style="margin-left:3px">Topics</span>
    </a>
</li>
<li>
    <a href="/admin/questions">
      <i class="fa fa-question"></i><span style="margin-left:3px">Questions</span>
    </a>
</li><li>
    <a href="/admin/questions-options">
      <i class="fa fa-windows"></i><span style="margin-left:3px">Options</span>
    </a>
</li>

<li>
    <a href="/admin/tests">
      <i class="fa fa-tumblr">ests</i>
    </a>
</li>
<li>
    <a href="/admin/test-answers">
      <i class="fa fa-font">nswers</i>
    </a>
</li>

HTML;
    }
}
