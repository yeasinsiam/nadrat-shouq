export default function useGetProducts({ selectedCategorySlug }) {
  const {
    data: { data: products },
    isLoading,
  } = useSWR(`/products?page=1&product_category_slug=${selectedCategorySlug}`);
}
