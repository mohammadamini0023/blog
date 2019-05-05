import React, { Component } from 'react';
import LazyLoad from 'react-lazyload';
import {Link} from 'react-router-dom';

//imnport material
import Card from 'react-bootstrap/Card';
import Button from 'react-bootstrap/Button';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';



class Products extends React.Component{
  constructor (props){
    super(props)
    this.state={imageProduct:[]};
  }

  renderProducts(){
    return this.props.products.map((product) => {
      let imageproduct=product.upload_image[0];
      let defaultimage="111.jpg";
      if(imageproduct != undefined){
         defaultimage=imageproduct.path;
      }

      return(
        <div>
          <Card style={{ width: '18rem' }}>
            <LazyLoad once>
              <Card.Img variant="top" className="ui-image" src={"/uploads/"+defaultimage} />
            </LazyLoad>
            <Card.Body>
              <Card.Title>{product.title_product}</Card.Title>
              <Card.Text>
                city: {product.city[0].city}
                <br/>
                proposal: {product.bidding.length}
                <br />
                peice: {product.pprice}
              </Card.Text>
              <Link to={{pathname: '/product/'+product.product_id+'/'+product.title_product ,state:{DetailsProduct: product}}}>
                <Button variant="primary">Go somewhere</Button>
              </Link>
            </Card.Body>
          </Card>
        </div>
        );
    });
  }

  render(){
    return(
      <div>
        <Row>
          {this.renderProducts()}
        </Row>
      </div>
    );
  }
}
export default Products;
