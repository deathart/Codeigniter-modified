<a href="#" id="ci-profiler-menu-open" class="bottom" onclick="ci_profiler_bar.open(); return false;" style="width: 2em">&nbsp;</a>
<div style="margin-top: 1%;"> <br /></div>
<div id="codeigniter-profiler" class="bottom">
    <div id="ci-profiler-menu">
        <!-- Console -->
        <?php if (isset($sections['console'])) : ?>
                <a href="#" id="ci-profiler-menu-console" onclick="ci_profiler_bar.show('ci-profiler-console', 'ci-profiler-menu-console'); return false;">
                        <span><?php echo is_array($sections['console']) ? $sections['console']['log_count'] + $sections['console']['memory_count'] : 0 ?></span>
                        Console
                </a>
        <?php endif; ?>
        <!-- Benchmarks -->
        <?php if (isset($sections['benchmarks'])) :?>
                <a href="#" id="ci-profiler-menu-time" onclick="ci_profiler_bar.show('ci-profiler-benchmarks', 'ci-profiler-menu-time'); return false;">
                        <span><?php echo $this->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end') ?> s</span>
                        Load Time
                </a>
                <a href="#" id="ci-profiler-menu-memory" onclick="ci_profiler_bar.show('ci-profiler-memory', 'ci-profiler-menu-memory'); return false;">
                        <span><?php echo (! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).' MB' ?></span>
                        Memory Used
                </a>
        <?php endif; ?>
        <!-- Queries -->
        <?php if (isset($sections['queries'])) : ?>
                <a href="#" id="ci-profiler-menu-queries" onclick="ci_profiler_bar.show('ci-profiler-queries', 'ci-profiler-menu-queries'); return false;">
                        <span><?php echo is_array($sections['queries']) ? (count($sections['queries']) - 1) : 0 ?> Queries</span>
                        Database
                </a>
        <?php endif; ?>
        <!-- Eloquent -->
        <?php if (isset($sections['eloquent'])) : ?>
                <a href="#" id="ci-profiler-menu-eloquent" onclick="ci_profiler_bar.show('ci-profiler-eloquent', 'ci-profiler-menu-eloquent'); return false;">
                        <span><?php echo is_array($sections['eloquent']) ? (count($sections['eloquent']) - 1) : 0 ?> Eloquent</span>
                        Illuminate\Database
                </a>
        <?php endif; ?>
        <!-- Vars and Config -->
        <?php if (isset($sections['http_headers']) || isset($sections['get']) || isset($sections['config']) || isset($sections['post']) || isset($sections['uri_string']) || isset($sections['controller_info'])) : ?>
                <a href="#" id="ci-profiler-menu-vars" onclick="ci_profiler_bar.show('ci-profiler-vars', 'ci-profiler-menu-vars'); return false;">
                        <span>vars</span> &amp; Config
                </a>
        <?php endif; ?>
        <!-- Files -->
        <?php if (isset($sections['files'])) : ?>
                <a href="#" id="ci-profiler-menu-files" onclick="ci_profiler_bar.show('ci-profiler-files', 'ci-profiler-menu-files'); return false;">
                        <span><?php echo is_array($sections['files']) ? count($sections['files']) : 0 ?></span> Files
                </a>
        <?php endif; ?>
        <a href="#" id="ci-profiler-menu-exit" onclick="ci_profiler_bar.close(); return false;" style="width: 2em; height: 2.1em"></a>
    </div>
    <?php if (count($sections) > 0) : ?>
        <!-- Console -->
        <?php if (isset($sections['console'])) :?>
                <div id="ci-profiler-console" class="ci-profiler-box" style="display: none">
                        <h2>Console</h2>
                        <?php if (is_array($sections['console'])) : ?>
                                <table class="main">
                                <?php foreach ($sections['console']['console'] as $log) : ?>
                                        <?php if ($log['type'] == 'log') : ?>
                                                <tr>
                                                        <td><?php echo $log['type'] ?></td>
                                                        <td class="faded"><pre><?php echo $log['data'] ?></pre></td>
                                                        <td></td>
                                                </tr>
                                        <?php elseif ($log['type'] == 'memory')  :?>
                                                <tr>
                                                        <td><?php echo $log['type'] ?></td>
                                                        <td>
                                                                <em><?php echo $log['data_type'] ?></em>:
                                                                <?php echo $log['name']; ?>
                                                        </td>
                                                        <td class="hilight" style="width: 9em"><?php echo $log['data'] ?></td>
                                                </tr>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                                </table>
                        <?php else : ?>
                                <?php echo $sections['console']; ?>
                        <?php endif; ?>
                </div>
        <?php endif; ?>
        <!-- Memory -->
        <?php if (isset($sections['console'])) :?>
                <div id="ci-profiler-memory" class="ci-profiler-box" style="display: none">
                        <h2>Memory Usage</h2>
                        <?php if (is_array($sections['console'])) : ?>
                                <table class="main">
                                <?php foreach ($sections['console']['console'] as $log) : ?>
                                        <?php if ($log['type'] == 'memory')  :?>
                                                <tr>
                                                        <td><?php echo $log['type'] ?></td>
                                                        <td>
                                                                <em><?php echo $log['data_type'] ?></em>:
                                                                <?php echo $log['name']; ?>
                                                        </td>
                                                        <td class="hilight" style="width: 9em"><?php echo $log['data'] ?></td>
                                                </tr>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                                </table>
                        <?php else : ?>
                                <?php echo $sections['console']; ?>
                        <?php endif; ?>
                </div>
        <?php endif; ?>
        <!-- Benchmarks -->
        <?php if (isset($sections['benchmarks'])) :?>
                <div id="ci-profiler-benchmarks" class="ci-profiler-box" style="display: none">
                        <h2>Benchmarks</h2>
                        <?php if (is_array($sections['benchmarks'])) : ?>
                                <table class="main">
                                <?php foreach ($sections['benchmarks'] as $key => $val) : ?>
                                        <tr><td><?php echo $key ?></td><td class="hilight"><?php echo $val ?></td></tr>
                                <?php endforeach; ?>
                                </table>
                        <?php else : ?>
                                <?php echo $sections['benchmarks']; ?>
                        <?php endif; ?>
                </div>
        <?php endif; ?>
        <!-- Queries -->
        <?php if (isset($sections['queries'])) :?>
                <div id="ci-profiler-queries" class="ci-profiler-box" style="display: none">
                        <h2>Queries</h2>
                        <?php if (is_array($sections['queries'])) : ?>
                                <table class="main" cellspacing="0">
                                <?php foreach ($sections['queries'] as $key => $queries) : ?>
                                        <?php foreach ($queries as $time => $query): ?>
                                                <tr><td class="hilight"><?php echo $time ?></td><td><?php echo $query ?></td></tr>
                                        <?php endforeach; ?>
                                <?php endforeach; ?>
                                </table>
                        <?php else : ?>
                                <?php echo $sections['queries']; ?>
                        <?php endif; ?>
                </div>
        <?php endif; ?>
        <!-- Eloquent -->
        <?php if (isset($sections['eloquent'])) :?>
                <div id="ci-profiler-eloquent" class="ci-profiler-box" style="display: none">
                        <h2>Eloquent</h2>
                        <?php if (is_array($sections['eloquent'])) : ?>
                                <table class="main" cellspacing="0">
                                <?php foreach ($sections['eloquent'] as $key => $queries) : ?>
                                        <?php foreach ($queries as $time => $query): ?>
                                                <tr><td class="hilight"><?php echo $time ?></td><td><?php echo $query ?></td></tr>
                                        <?php endforeach; ?>
                                <?php endforeach; ?>
                                </table>
                        <?php else : ?>
                                <?php echo $sections['eloquent']; ?>
                        <?php endif; ?>
                </div>
        <?php endif; ?>
        <!-- Vars and Config -->
        <?php if (isset($sections['http_headers']) || isset($sections['get']) || isset($sections['config']) || isset($sections['post']) || isset($sections['uri_string']) || isset($sections['controller_info']) || isset($sections['userdata'])) :?>
                <div id="ci-profiler-vars" class="ci-profiler-box" style="display: none">
                        <!-- View Data -->
                        <?php if (isset($sections['view_data'])) : ?>
                                <a href="#" onclick="ci_profiler_bar.toggle_data_table('view_data'); return false;">
                                        <h2>VIEW DATA</h2>
                                </a>
                                <?php if (is_array($sections['view_data'])) : ?>

                                        <table class="main" id="view_data_table">
                                        <?php foreach ($sections['view_data'] as $key => $val) : ?>
                                                <tr><td class="hilight"><?php echo $key ?></td><td><?php echo $val ?></td></tr>
                                        <?php endforeach; ?>
                                        </table>

                                <?php endif; ?>
                        <?php endif; ?>
                        <!-- User Data -->
                        <?php if (isset($sections['userdata'])) :?>
                                        <a href="#" onclick="ci_profiler_bar.toggle_data_table('userdata'); return false;">
                                                <h2>SESSION USER DATA</h2>
                                        </a>
                                        <?php if (is_array($sections['userdata']) && count($sections['userdata'])) : ?>

                                                <table class="main" id="userdata_table">
                                                <?php foreach ($sections['userdata'] as $key => $val) : ?>
                                                        <tr><td class="hilight"><?php echo $key ?></td><td><?php echo $val ?></td></tr>
                                                <?php endforeach; ?>
                                                </table>
                                        <?php endif; ?>
                                <?php endif; ?>
                        <!-- The Rest -->
                        <?php foreach (array('get', 'post', 'uri_string', 'controller_info', 'headers', 'config') as $section) : ?>
                                <?php if (isset($sections[$section])) :?>
                                        <?php $append = ($section == 'get' || $section == 'post') ? '_data' : '' ?>
                                        <a href="#" onclick="ci_profiler_bar.toggle_data_table('<?php echo $section ?>'); return false;">
                                                <h2><?php echo lang('profiler_' . $section . $append) ?></h2>
                                        </a>
                                                <table class="main" id="<?php echo $section ?>_table">
                                                <?php if (is_array($sections[$section])) : ?>
                                                <?php foreach ($sections[$section] as $key => $val) : ?>
                                                        <tr><td class="hilight"><?php echo $key ?></td><td><?php echo htmlspecialchars($val) ?></td></tr>
                                                <?php endforeach; ?>
                                                <?php else : ?>
                                                        <tr><td><?php echo $sections[$section]; ?></td></tr>
                                                <?php endif; ?>
                                                </table>
                                <?php endif; ?>
                        <?php endforeach; ?>
                </div>
        <?php endif; ?>
        <!-- Files -->
        <?php if (isset($sections['files'])) :?>
            <div id="ci-profiler-files" class="ci-profiler-box" style="display: none">
                <h2>Loaded Files</h2>
                <?php if (is_array($sections['files'])) : ?>
                    <table class="main">
                    <?php foreach ($sections['files'] as $key => $val) : ?>
                        <tr>
                            <td class="hilight">
                                <?php echo preg_replace("/\/.*\//", "", $val) ?>
                                <br/><span class="faded small"><?php echo str_replace(FCPATH, '', $val) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                <?php else : ?>
                        <?php echo $sections['files']; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <p class="ci-profiler-box"><?php echo lang('profiler_no_profiles') ?></p>
    <?php endif; ?>
</div>	<!-- /codeigniter_profiler -->
