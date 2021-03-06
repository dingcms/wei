<?php if (!defined('THINK_PATH')) exit();?><table id="treegrid_newssort">

</table>

<script>
    $(function() {
        var classId = 'newssort';
        var urljson = '<?php echo U("Admin/NewsSort/json");?>';
        var hrefadd = '<?php echo U("Admin/NewsSort/add");?>';
        var hrefedit = '<?php echo U("Admin/NewsSort/edit");?>';
        var hrefcancel = '<?php echo U("Admin/NewsSort/delete");?>';
        //openTreeGrid(classId,urljson,hrefadd,hrefedit,hrefcancel);
        var height = $('.indexcenter').height();
        $('#treegrid_' + classId).treegrid({
            url: urljson,
            idField: 'id',
            treeField: 'text',
            //pagination:true,
            rownumbers: true,
            fitColumns: true,
            autoRowHeight: false,
            showFooter: true,
            height: height - 50,
            animate: true,
            columns: [[
                    {field: 'id', title: 'ID', width: 50, align: 'center'},
                    {field: 'text', title: '分类名称', width: 200},
                    //{field:'parent_id',title:'parent_id',width:200},
                    {
                        field: 'action',
                        title: '操作',
                        width: 50,
                        formatter: function(value, row, index) {
                            return '<img class="btn_do" src="/Public/Easyui/themes/icons/pencil.png" onclick="ding_edit(\'' + hrefedit + '?id=' + row.id + '\',\'' + classId + '\')"  title="编辑"/>&nbsp;\n\
<img class="btn_do" src="/Public/Easyui/themes/icons/cancel.png" onclick="ding_cancel(\'' + row.id + '\',\'' + hrefcancel + '\',\'' + classId + '\')" title=" 删除"/>&nbsp;';
                        }
                    }
                ]],
            toolbar: [{
                    id: 'btnadd' + classId,
                    text: '添加',
                    iconCls: 'icon-add',
                    handler: function() {
                        var title = '添加分类';
                        openDialog(classId, hrefadd, title);
                    }
                }, '-', {
                    id: 'btnexpand' + classId,
                    text: '展开',
                    iconCls: 'icon-redo',
                    handler: function() {
                        var node = $('#treegrid_' + classId).treegrid('getSelected');
                        if (node) {
                            $('#treegrid_' + classId).treegrid('expandAll', node.id);
                        } else {
                            $('#treegrid_' + classId).treegrid('expandAll');
                        }
                    }
                }, '-', {
                    id: 'btncollapse' + classId,
                    text: '折叠',
                    iconCls: 'icon-undo',
                    handler: function() {
                        var node = $('#treegrid_' + classId).treegrid('getSelected');
                        if (node) {
                            $('#treegrid_' + classId).treegrid('collapseAll', node.id);
                        } else {
                            $('#treegrid_' + classId).treegrid('collapseAll');
                        }
                    }
                }, '-', {
                    id: 'btnedit' + classId,
                    text: '刷新',
                    iconCls: 'icon-reload',
                    handler: function() {
                        $('#treegrid_' + classId).treegrid('reload');
                    }
                }
            ]
        });

    });
</script>