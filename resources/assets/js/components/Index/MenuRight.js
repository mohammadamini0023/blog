//import component react & npm
import React, { Component } from 'react';
import {Link} from 'react-router-dom';

//import component me
import ListGroup from 'react-bootstrap/ListGroup';


class MenuRight extends Component {
  constructor (props){
    super(props)
    this.renderRow=this.renderRow.bind(this);
  }
    renderRow(){
      return this.props.Categorys.map((category) => {
        return(
          <div key={category.category_id}>
            <Link to={{pathname: '/'+category.category+'/'+category.category_id
              ,state: {Category_Id: category.category_id ,CategoryName:category.category }}}>
              <ListGroup.Item action variant="light">
                 {category.category}
               </ListGroup.Item>
            </Link>
          </div>
        );
      });
    }

    render(){
      return (
        <div>
          <ListGroup>
            <ListGroup.Item>AllProduct</ListGroup.Item>
            {this.renderRow()}
          </ListGroup>
        </div>
      );
    }
}
export default MenuRight;
