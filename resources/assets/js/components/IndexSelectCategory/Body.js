//import component react & npm
import React, { Component } from 'react';
import Axios from 'axios';

//imnport material
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';


//import component me;
import MenuRight from './MenuRight'
import Products from './Products'


class Body extends React.Component{
  constructor (props){
    super(props)
    this.props=props;
    this.state = {categorys:[],products:[],category_id:this.props.category_id ,categoryname:this.props.categoryname,
                url:'http://localhost:8080/api/ProCategorySelect' , paginate:[]};
    this.loadMore=this.loadMore.bind(this);
  }

  //daryaft etelaat api az noe safhe bandi
  makePaginate(product){
    let paginate={
      current_page:product.current_page,
      last_page : product.last_page,
      last_page_url : product.last_page_url,
      next_page_url : product.next_page_url
    }
    this.setState({paginate : paginate});
  }

  fetchProduct(){
    //get categoryss
    Axios.get('http://localhost:8080/api/Category',{params:{category_id:this.state.category_id}}).then((response) => {
      this.setState({
        categorys : response.data,
      });
    }).catch( (error) => {
      console.log(error);
    });
    //get Products
    Axios.get(this.state.url,{params:{category_id:this.state.category_id}}).then((response) => {
                    this.setState({
                      products : this.state.products.length> ? this.state.products.concat(response.data.data): response.data.data,
                      url : response.data.next_page_url
                    });
                    this.makePaginate(response.data);
                }).catch( (error) => {
                    console.log(error);
                });
  }

    componentWillMount(){
    this.fetchProduct();
    }

    loadMore(){
      this.setState({url : this.state.paginate.next_page_url},()=>{this.fetchProduct()});
    }

    //update component for receveir props
    componentWillReceiveProps(newProps){
      this.setState({category_id:newProps.category_id  , AllTheAds:newProps.categoryname ,categoryname:newProps.categoryname}, ()=>{
        //get categoryss
        Axios.get('http://localhost:8080/api/Category',{params:{category_id:this.state.category_id}}).then((response) => {
          this.setState({
            categorys : response.data,
          });
        }).catch( (error) => {
          console.log(error);
        });
        //get Products
        Axios.get('http://localhost:8080/api/ProCategorySelect',{params:{category_id:this.state.category_id}}).then((response) => {
                        this.setState({
                          products : response.data.data,
                          url : response.data.next_page_url
                        });
                        this.makePaginate(response.data);
                    }).catch( (error) => {
                        console.log(error);
                    });
      });
     }

  render() {
    return (

      <div>
        <Row>
          <Col xl={2} className="col-centered col-menuright">
            <MenuRight Categorys={this.state.categorys} categoryname={this.state.categoryname} rebackpage={this.props.rebackpage}  />
          </Col>
          <Col xl={8} className="col-centered col-product">
            <Products  products={this.state.products} />
            <Button onClick={this.loadMore} raised="true" >load mor result</Button>
          </Col>
        </Row>
      </div>
    );
  }
}
export default Body;
