until [ -d ./node_modules/.vite ]
do
    echo "Waiting for vite directory"
    sleep 1
done
echo "Vite found"
exit