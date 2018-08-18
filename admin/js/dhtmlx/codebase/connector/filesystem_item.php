<?php
 class FileTreeDataItem extends TreeDataItem { function has_kids(){ if ($this->data['is_folder'] == '1') { return true; } else { return false; } } } ?>