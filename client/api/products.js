import axios from "@/utils/axios";

export default async function apiGetProducts() {
  return await axios
    .get(`/products?page=1&product_category_slug=`)
    .then((res) => res.data);
}

export async function apiGetProduct(productSlug) {
  return await axios.get(`/products/${productSlug}`).then((res) => res.data);
}
