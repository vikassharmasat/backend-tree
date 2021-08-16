Binary Tree


## Fetch Nodes from api
    
    Run Migration
    - Use post api http://localhost/fetch-node with param parent_id to get thier immediate child
    - Remove comment **[--AND t.length = 1]** from NodeManageController on fetchNod. Then Use post api http://localhost/fetch-node with param parent_id to get thier all nodes.
    - Use post api http://localhost/create-node with param last_id of parent to create thier child
    

