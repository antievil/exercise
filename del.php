<?php
//统一删除（根据id）
    public function del($table,$id='null',$relaTable=null,$relaField=null){
        //checkbox删除
        if($id=='null'){
            $post=$this->input->post('checkbox');
            //判断关联
            if(!empty($relaTable)) {
                foreach ($post as $v) {
                    if ($this->db->where($relaField, $v)->get($relaTable)->row_array()) {
                        exit("<script>alert('删除失败,请查看数据是否有关联');window.history.go(-1);</script>");
                    }
                }
            }
            //执行删除
            if($this->db->where_in('id',$post)->delete($table)){
                echo "<script>alert('删除成功');window.history.go(-1);</script>";
            }else{
                echo "<script>alert('删除失败');window.history.go(-1);</script>";
            }

        }
        //链接单个删除
        else{
            //判断关联
            if(!empty($relaTable)) {
                if (count($this->db->where($relaField, $id)->get($relaTable)->row_array())) {
                    exit("<script>alert('删除失败,请查看数据是否有关联');window.history.go(-1);</script>");
                }
            }
            //执行删除
                if($get=$this->db->where('id',$id)->delete($table)){
                    echo "<script>alert('删除成功');window.history.go(-1);</script>";
                }else{
                    echo "<script>alert('删除失败');window.history.go(-1);</script>";
                }

        }
    }
