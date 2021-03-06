<?php if (!defined('THINK_PATH')) exit();?><div class="easyui-layout layout_settinglist">
    <div data-options="region:'west',split:true" title="文档分类" style="width:150px;">
        <ul class="easyui-tree tree_settinglist" data-options="url:'<?php echo U('Admin/Setting/jsonTree');?>'" style="padding: 10px 5px;">
        </ul>
    </div>
    <div data-options="region:'center'" style="">
        <div id="tabs_settinglist" class="easyui-tabs"  fit="true" border="false">
        </div>
        <script>
            $(function() {
                var height = $('.indexcenter').height();
                var classId = 'settinglist';
                $('.layout_' + classId).css('height', height - 50);
                $('.tree_' + classId).tree({
                    onClick: function() {
                        var node = $('.tree_' + classId).tree('getSelected');
                        var nid = node.id;
                        var url = '/admin/Setting/settinglist/id/' + nid;
                        var subtitle = node.text;
                        if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                            $('#tabs_' + classId).tabs('add', {
                                title: subtitle,
                                content: subtitle,
                                closable: true,
                                href: url,
                                tools: [{
                                        iconCls: 'icon-mini-refresh',
                                        handler: function() {
                                            updateTab(classId, url, subtitle);
                                        }
                                    }]
                            });
                            return false;
                        } else {
                            $('#tabs_' + classId).tabs('select', subtitle);
                            return false;
                        }
                    }//onclick
                });

            });
        </script>
    </div>
</div>